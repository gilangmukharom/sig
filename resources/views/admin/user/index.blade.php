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
													<span class="card-label font-weight-bolder text-dark">Data User Terbaru</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian User</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<div class="tab-content">
													<!--begin::Table-->
													<div class="table-responsive">
														<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
															<thead>
																<tr class="text-left text-uppercase">
																	<th style="min-width: 250px" class="pl-7">
																		<span class="text-dark-75">Nama</span>
																	</th>
																	<th style="min-width: 100px">Email</th>
																	<th style="min-width: 100px">Alamat</th>
																	<th style="min-width: 100px">Role</th>
																	<th style="min-width: 100px">Nomer Telepon</th>
																	<th style="min-width: 100px">Verifikasi</th>
																	<th style="min-width: 100px">Aksi</th>
																</tr>
															</thead>
															<tbody>
                                                            @foreach($users as $item)
																<tr>
																	<td class="pl-0 py-8">
																		<div class="d-flex align-items-center">
																			<div class="symbol symbol-50 symbol-light mr-4">
																				<span class="symbol-label">
																					<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="" />
																				</span>
																			</div>
																			<div>
																				<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$item -> name}}</a>
																			</div>
																		</div>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item -> email}}</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{!! $item -> alamat !!}</span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->utype}}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->phone}}</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	@if($item->email_verified_at == "")
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Belum Verifikasi</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	@else
																	<td>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Terverifikasi</span>
																		<span class="text-muted font-weight-bold"></span>
																	</td>
																	@endif
																	<td class="pr-0 text-left">
																		<a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">Show</a>
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