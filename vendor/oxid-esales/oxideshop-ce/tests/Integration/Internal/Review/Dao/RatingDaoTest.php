<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Integration\Internal\Review\Dao;

use OxidEsales\EshopCommunity\Internal\Review\ServiceFactory\ReviewServiceFactory;
use OxidEsales\TestingLibrary\UnitTestCase;
use OxidEsales\Eshop\Application\Model\Rating as EshopRating;
use OxidEsales\EshopCommunity\Internal\Review\DataObject\Rating;
use OxidEsales\Eshop\Core\Field;

class RatingDaoTest extends UnitTestCase
{
    public function testGetRatingsByUserId()
    {
        $this->createTestRatingsForGetRatingsByUserIdTest();

        $ratingDao = $this->getRatingDao();
        $ratings = $ratingDao->getRatingsByUserId('user1');

        $this->assertCount(2, $ratings->toArray());
        $this->assertInstanceOf(Rating::class, $ratings->first());
    }

    public function testGetRatingsByProductId()
    {
        $this->createTestRatingsForGetRatingsByProductIdTest();

        $ratingDao = $this->getRatingDao();
        $ratings = $ratingDao->getRatingsByProductId('product1');

        $this->assertCount(2, $ratings->toArray());
        $this->assertInstanceOf(Rating::class, $ratings->first());
    }

    public function testDeleteRating()
    {
        $this->createTestRatingsForDeleteRatingTest();

        $ratingDao = $this->getRatingDao();

        $ratingsBeforeDeletion = $ratingDao->getRatingsByUserId('user1');
        $ratingToDelete = $ratingsBeforeDeletion->first();

        $ratingDao->delete($ratingToDelete);

        $ratingsAfterDeletion = $ratingDao->getRatingsByUserId('user1');

        $this->assertNotContains(
            $ratingToDelete,
            $ratingsAfterDeletion->toArray()
        );
    }

    private function createTestRatingsForDeleteRatingTest()
    {
        $rating = oxNew(EshopRating::class);
        $rating->setId('id1');
        $rating->oxratings__oxuserid = new Field('user1');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id2');
        $rating->oxratings__oxuserid = new Field('user1');
        $rating->save();
    }

    private function createTestRatingsForGetRatingsByUserIdTest()
    {
        $rating = oxNew(EshopRating::class);
        $rating->setId('id1');
        $rating->oxratings__oxuserid = new Field('user1');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id2');
        $rating->oxratings__oxuserid = new Field('user1');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id3');
        $rating->oxratings__oxuserid = new Field('userNotMatched');
        $rating->save();
    }

    private function createTestRatingsForGetRatingsByProductIdTest()
    {
        $rating = oxNew(EshopRating::class);
        $rating->setId('id1');
        $rating->oxratings__oxobjectid = new Field('product1');
        $rating->oxratings__oxtype = new Field('oxarticle');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id2');
        $rating->oxratings__oxobjectid = new Field('product1');
        $rating->oxratings__oxtype = new Field('oxarticle');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id3');
        $rating->oxratings__oxobjectid = new Field('productNotMatched');
        $rating->oxratings__oxtype = new Field('oxarticle');
        $rating->save();

        $rating = oxNew(EshopRating::class);
        $rating->setId('id4');
        $rating->oxratings__oxobjectid = new Field('product1');
        $rating->oxratings__oxtype = new Field('oxrecommlist');
        $rating->save();

    }

    private function getRatingDao()
    {
        $reviewServiceFactory = new ReviewServiceFactory();

        return $reviewServiceFactory->getRatingDao();
    }
}
