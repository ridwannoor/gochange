@extends('back.layouts.app')

@section('m-subheader')
<div class="m-subheader">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/admin/home" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="/admin/general" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>
                {{-- <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">JQVMap</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('back.component.alert')

   <div class="row">
       <div class="col-xl-12">
      
       <!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							{{ $judul }}
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_1">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Permission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Bank</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_4">User</a>
                    </li>
                </ul>    

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <!--begin::Section-->
                        <div class="m-section">
                            {{-- <span class="m-section__sub">
                                Using the most basic table markup, here’s how tables look in Metronic:
                            </span> --}}
                            <div class="m-section__content">
                                <table class="table">
                                    {{-- <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead> --}}
                                    <tbody>
                                        <tr >
                                            <td width="150px">Title</td>
                                            <td width="500px">{{ $generals->title }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>{{ $generals->deskripsi }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $generals->phone }}</td>
                                        </tr>                                   
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $generals->alamat }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $generals->email }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Website</td>
                                            <td>{{ $generals->website }}</td>
                                        </tr>
                                        <tr>
                                            <td>Facebook</td>
                                            <td>{{ $generals->facebook }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Whatsapp</td>
                                            <td>{{ $generals->whatsapp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Instagram</td>
                                            <td>{{ $generals->instagram }}</td>
                                        </tr>	
                                        <tr>
                                            <td>Image</td>
                                            <td>
                                                <img src="{{ url('data_file/'.$generals->image) }}" style="width: 100px; " alt="">
                                            </td>
                                        </tr>								    	
                                    </tbody>
                                </table>
                                
                                <a href="/admin/general/edit/{{ $generals->id }}" class="btn btn-success pull-right">Edit</a>
                            </div>
                        </div>
				<!--end::Section-->
                    </div>
                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                        <div class="m-section">
                            <div class="m-section__content">
                                <form class="m-form m-form--fit m-form--label-align-right" action="/admin/general/permission" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="_method" value="PUT" />
                                        <input type="hidden" name="id" value="{{$generals->id}}" />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Service</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->service == 1 ? ' checked' : '') }} name="service" id="service">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Testimoni</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->testimoni == 1 ? ' checked' : '') }} name="testimoni" id="testimoni">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Portfolio</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox"  data-on-color="brand" value="1" {{  ($generals->portfolio == 1 ? ' checked' : '') }} name="portfolio" id="portfolio">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Blog</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->blog == 1 ? ' checked' : '') }} name="blog" id="blog">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Team</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->team == 1 ? ' checked' : '') }} name="team" id="team">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Product</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->product == 1 ? ' checked' : '') }} name="product" id="product">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                          
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Gallery</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->gallery == 1 ? ' checked' : '') }} name="gallery" id="gallery">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Video</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->video == 1 ? ' checked' : '') }} name="video" id="video">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Slider</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->slider == 1 ? ' checked' : '') }} name="slider" id="slider">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Banner</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand" value="1" {{  ($generals->banner == 1 ? ' checked' : '') }} name="banner" id="banner">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label class="col-form-label col-lg-3 col-sm-12">Sponsor</label>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <input data-switch="true" type="checkbox" data-on-color="brand"value="1" {{  ($generals->sponsor == 1 ? ' checked' : '') }} name="sponsor" id="sponsor">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  
                                    
                                    
                                    
                                    {{-- <a href="#" class="btn btn-success">Edit</a> --}}
                                    <div class="form-group m-form__group row">
                                        {{-- <label class="col-form-label col-lg-3 col-sm-12">Slider</label> --}}
                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                            <button class="btn btn-success" type="submit">Save</button>
                                            {{-- <a href="#" class="btn btn-success">Simpan</a> --}}
                                            {{-- <input data-switch="true" type="checkbox" checked data-on-color="brand"  id="m_notify_dismiss"> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>                        
                    </div>

                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                        <div class="m-section">
                            <div class="m-section__content">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-xs btn-primary mb-4" data-toggle="modal" data-target="#modelId">
                               <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah
                              </button>
                              
                              <table class="table table-striped table-bordered table-hover table-checkable" id="m_table_1">
                                  <thead class="thead-inverse">
                                      <tr>
                                          <th>Bank</th>
                                          <th>Account</th>
                                          <th>#</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($accountbanks as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->bank->kode_bank . ", " . $item->bank->nama_bank }} </td> 
                                                    <td>   {{ $item->no_rek }} <br>
                                                        {{ $item->pemilik }}</td>                                             
                                              
                                                <td>
                                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editbank{{ $item->id }}">
                                                        <i class="fa fa-edit" aria-hidden="true"></i> </button>
                                                                                                        
                                                            <!-- Modal -->
                                              
                                                    <a href="/admin/bank/destroy/{{ $item->id }}" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            </tr>
                                          @endforeach                                        
                                      </tbody>
                              </table>
                              <!-- Modal -->
                              <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">Bank</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                          </div>
                                          <form action="/admin/bank/store" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="_method" value="POST" />
                                                <input type="hidden" name="id" value="{{$generals->id}}" />
                                            </div>
                                          <div class="modal-body">                                              
                                                  <div class="form-group">
                                                    <label for="">Nama Bank</label>
                                                    <select class="form-control" name="bank_id" id="bank_id">
                                                        @foreach ($banks as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kode_bank . ", " . $item->nama_bank}}</option>     
                                                        @endforeach                                                                                                      
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">No Rekening</label>
                                                    <input type="text"
                                                      class="form-control" name="no_rek" id="no_rek" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">Pemilik Rekening</label>
                                                    <input type="text"
                                                      class="form-control" name="pemilik" id="pemilik" aria-describedby="helpId" placeholder="">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                  </div>                                            
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Save</button>
                                          </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              @foreach ($accountbanks as $item)                                  
                                <div class="modal fade" id="editbank{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <form action="/admin/bank/update" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{$item->id}}" />
                                        </div>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Bank</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Nama Bank</label>
                                                    <select class="form-control" name="bank_id" id="bank_id">
                                                        <option value="{{ $item->id }}">{{ $item->bank->kode_bank . ", " . $item->bank->nama_bank}}</option>     
                                                        @foreach ($banks as $vd)
                                                            @if ($item->bank_id != $vd->id)
                                                                <option value="{{ $vd->id }}">{{ $vd->kode_bank . ", " . $vd->nama_bank}}</option>     
                                                            @endif                                                       
                                                        @endforeach                                                                                                      
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">No Rekening</label>
                                                    <input type="text"
                                                      class="form-control" name="no_rek" id="no_rek" aria-describedby="helpId" value="{{ $item->no_rek }}">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="">Pemilik Rekening</label>
                                                    <input type="text"
                                                      class="form-control" name="pemilik" id="pemilik" aria-describedby="helpId" value="{{ $item->pemilik }}">
                                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                                  </div>  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="m_tabs_1_4" role="tabpanel">
                        <div class="m-section">
                            <div class="m-section__content">

                            </div>
                        </div>
                    </div>
                </div>   

				

				
			</div>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->

   </div>
</div>
    {{-- <div class="row">
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                World Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_world" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                USA Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_usa" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Europe Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_europe" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Russia Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_russia" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Germany Map
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_jqvmap_germany" class="m-jqvmap" style="height:300px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div> --}}
</div>
@endsection

@section('script-footer')
<script src="{{ asset('back/assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
@endsection

