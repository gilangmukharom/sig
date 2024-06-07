@extends('layouts.back')
@section('contents')

<!--begin::Row-->
<div class="d-flex flex-column-fluid">
									<div class="container">
								<div class="row">
									<div class="col">
										<!--begin::Advance Table Widget 4-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Data Produk</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian Produk Sebagai Berikut</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"><a href="{{route('createproduct')}}" class="btn btn-light-success">Tambah Produk</a></span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<div class="tab-content">
													<!--begin::Table-->
													<div class="table-responsive">
													@if(session('success'))
													<div class="alert alert-success">
														{{session('success')}}
													</div>
													@else(session('error'))
													<div class="alert alert-error">
														{{session('error')}}
													</div>
													@endif
														<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
															<thead>
																<tr class="text-left text-uppercase">
																	<th style="min-width: 250px" class="pl-7">
																		<span class="text-dark-75">Nama Produk</span>
																	</th>
																	<th style="min-width: 100px">Deskripsi</th>
																	<th style="min-width: 100px">Harga</th>
																	<th style="min-width: 140px">Action</th>
																</tr>
															</thead>
															<tbody>
                                                            @foreach($products as $item)
																<tr>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$item -> product_name}}</a>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item -> product_desc }}</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item-> harga}}</span>
																	</td>
																	<td class="p-2" style="vertical-align:middle;">
																		<a href="{{route('editproduct',$item->id)}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i data-feather="edit"></i></a>
																		<form action="{{ route('deleteProduct', $item->id) }}" method="post" style="display:inline-block;">
																		@csrf
																		@method('DELETE')
																		<button type="submit" class="btn btn-light-success" onclick="return confirm('Are you sure you want to delete this product?')"><i data-feather="trash"></i></button>
																		</form>
																	</td>
																</tr>
                                                                @endforeach
															</tbody>
														</table>
													</div>
													<!--end::Table-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 4-->
									</div>
								</div>
							</div>
								<!--end::Row-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
@endsection