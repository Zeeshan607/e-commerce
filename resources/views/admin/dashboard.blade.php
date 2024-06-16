
@extends('admin.layout.app')

@section('content')


				<div class="container-fluid p-0">
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Holy guacamole!</strong> You should check in on some of those fields below.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>




					  <div class="container-fluid">

						<div class="row">
							<div class="col-lg-12">
							  <div class="card">
								 <div class="card-header text-uppercase text-white" style="background-color: rgb(43, 103, 216);">Add New Meme</div>
								 <div class="card-body">
									<form>
									<div class="row mt-2">
									<div class="col-12 md-6 pb-2">
										<fieldset class="border p-2">
											<legend  class="w-auto text-uppercase"><small>Member Detail</small> </legend>
											<div class="row">
												<div class="col form-group">
													<div class="card-body">
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
															<select class="form-control required single-select">
																<option selected>Select Coordinator</option>
																<option value="0">NAme1</option>
																<option value="1">Name2</option>
																<option value="2">Name3</option>
															</select>
															<label class="form-label select-label" for="coordinator">Coordinator</label>
														</div><!--End Coordinator-->
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
															<select class="form-control required single-select">
																<option selected>Select Program</option>
																<option value="0">NAme1</option>
																<option value="1">Name2</option>
																<option value="2">Name3</option>
															</select>
															<label class="form-label select-label" for="program">Program</label>
														</div><!--End Program-->


														<div class="form-group col-sm-12 col-md-4 mb-3 float-right">
															<div class="form-outline datepicker">
																<input class="form-control required" type="date" id="date" name="date">
																<label class="form-label select-label" for="date">Select Date</label>
																<div class="invalid-feedback">Invalid date or date format</div>
															</div>
														</div><!--End start date -->

														<div class="col-sm-4 lg-4 form-group">
														  <label for="date" class="col-form-label font-weight-bolder float-left"></label>
														  <input type="date" name="" id="date" class="form-control" placeholder="Select date" />
														  <small>Select your trip Date.</small>
													  </div>
													  <div class="col-sm-4 form-group">
														  <label for="time" class="col-form-label font-weight-bolder float-left"></label>
														  <input type="time" name="" id="time" class="form-control" placeholder="Select time" />
														  <small>Select your trip time.</small>
													  </div>
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
															<select class="form-control required single-select" name="denomination">
																<option selected>Select Denominaton</option>
																<option value="0">Deno1</option>
																<option value="1">Deno2</option>
																<option value="2">Deno3</option>
															</select>
															<label class="form-label select-label" for="denomination">Denomination</label>
														</div><!--End Program-->
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
														  <select class="form-control required single-select">
															  <option default>Select Country</option>
															  <option value="0">USA</option>
															  <option value="1">Canada</option>
															  <option value="2">Spain</option>
															  <option value="2">Germany</option>
														  </select>
														  <label class="form-label select-label" for="projectcountry">Country</label>
														</div><!--End project Country-->
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
														  <select class="form-control required single-select">
															  <option default>Select State</option>
															  <option value="0">1</option>
															  <option value="1">2</option>
															  <option value="2">3</option>
															  <option value="2">4</option>
														  </select>
														  <label class="form-label select-label" for="projectstate">State</label>
														</div> <!--End project State-->
														<div class="form-group col-sm-12 col-md-4 mb-3 float-left">
														  <select class="form-control required single-select">
															  <option default>Select District</option>
															  <option value="0">1</option>
															  <option value="1">2</option>
															  <option value="2">3</option>
															  <option value="3">4</option>
														  </select>
														  <label class="form-label select-label" for="projectdistt">District</label>
														</div> <!--End project District-->
														<div class="form-group col-sm-12 col-md-8 mb-3 float-left">
															<div class="form-outline">
															  <input class="required form-control" type="text" id="projectcity" placeholder="Enter Project City ">
															  <label class="form-label" for="projectcity">City</label>
															</div>
														</div><!--End Project Address-->

													   <!--Start Submission Buttons-->
														<div class="row mb-4 mt-3 justify-content-end">
															<div class="col-sm-12 col-md-8 lg-6 btn-group float-right mr-3 mt-4">
																<button type="button" role="button" class="btn btn-danger waves-effect px-3 mt-2">Cancel</button> &nbsp;&nbsp;
																<button type="button" role="button" class="btn btn-info waves-effect px-5 mt-2">Add</button>

															</div>
														</div>




													</div>

												</div>
											</div>
										</fieldset>
									</div>
									</div>
									</form>


				<div class="row mt-2">
				  <div class="col">
				  <div class="card">
					<div class="card-header" style="background-color: blue;"><h2> Profile Stats</h2></div>
					<div class="card-body">
													  <!-- Start DATA Toggle Area-->

														<div id="panel4" class="panel">


														  <div id="">
															  <input type="hidden" name="" id="\" value="">
														  </div>
														  <div id="">
															  <input type="hidden" name="" id="" value="">
														  </div>
														  <div id="">
															  <input type="hidden" name="" id="" value="">
														  </div>
														  <div id="">
															  <input type="hidden" name="" id="" value="[]">
														  </div>
														  <div id="">
															  <input type="hidden" name="" id="" value="[]">
														  </div>
														  <h3 class="secDivider first clearfix">
															  <div class="pull-right">
																  <div class="btn-group">
																	  <button id="bidId1" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  Last 30 Days</button>
																	  <button id="bidId2" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  Year</button>
																	  <button id="bidId3" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  All Time</button>
																  </div>
															  </div>
															  Profile Views
														  </h3>
														  <!-- <img src="../images/profile/mockup/chart.png" />-->
														  <div id="chartContainer" style="min-width: 310px; height: 200px; margin: 0 auto" class="hide">
															<div style="position: relative;">
															  <div dir="ltr" style="position: relative; width: 737px; height: 200px;">
																<div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
																  <svg width="737" height="200" aria-label="A chart." style="overflow: hidden;">
																	<defs id="_ABSTRACT_RENDERER_ID_10">
																	  <clipPath id="_ABSTRACT_RENDERER_ID_11">
																		<rect x="88" y="38" width="561" height="124"></rect>
																	  </clipPath>
																	</defs>
																	<rect x="0" y="0" width="737" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect>
																	<g><text text-anchor="start" x="88" y="23.2" font-family="Arial" font-size="12" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">View/Time Chart</text>
																	  <rect x="88" y="13" width="561" height="12" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																	</g>
																	<g><rect x="88" y="38" width="561" height="124" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
																	  <g clip-path="url(https://www.guru.com/pro/profilebuild.aspx?tab=7#_ABSTRACT_RENDERER_ID_11)">
																		<g><rect x="88" y="161" width="561" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
																		  <rect x="88" y="100" width="561" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
																		  <rect x="88" y="38" width="561" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
																		  <rect x="88" y="130" width="561" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
																		  <rect x="88" y="69" width="561" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect>
																		</g>
																		<g><path d="M128.5,161.5L208.5,38.5L288.5,38.5L368.5,161.5L448.5,38.5L528.5,161.5L608.5,161.5" stroke="#808080" stroke-width="3" fill-opacity="1" fill="none"></path>
																		</g>
																	  </g>
																	  <g>
																		<circle cx="128.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="208.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="288.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="368.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="448.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="528.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="608.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#808080"></circle>
																		<circle cx="128.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="208.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="288.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="368.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="448.5" cy="38.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="528.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																		<circle cx="608.5" cy="161.5" r="3.5" stroke="none" stroke-width="0" fill="#ff0000"></circle>
																	  </g>
																	  <g>
																		<g><text text-anchor="middle" x="128.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Jun 2022</text>
																		</g>
																		<g><text text-anchor="middle" x="208.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Aug 2022</text>
																		</g>
																		<g><text text-anchor="middle" x="288.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Sep 2022</text>
																		</g>
																		<g><text text-anchor="middle" x="368.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Nov 2022</text>
																		</g>
																		<g><text text-anchor="middle" x="448.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Dec 2022</text>
																		</g>
																		<g><text text-anchor="middle" x="528.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Feb 2023</text>
																		</g>
																		<g><text text-anchor="middle" x="608.5" y="179.2" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#222222">Mar 2023</text>
																		</g>
																		<g><text text-anchor="end" x="76" y="165.7" font-family="Arial" font-size="12" stroke="none" stroke-width="0" fill="#444444">1.0</text>
																		</g>
																	  </g>
																	</g>
																	<g></g>
																  </svg>
																  <div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
																	<table>
																	  <thead>
																		<tr>
																		  <th>Time</th>
																		  <th>View</th>
																		  <th>View</th>
																		</tr>
																	  </thead>
																	  <tbody>
																		<tr>
																		  <td>Jun 2022</td>
																		  <td>1</td>
																		  <td>1</td>
																		</tr>
																		<tr>
																		  <td>Aug 2022</td>
																		  <td>2</td>
																		  <td>2</td>
																		</tr>
																		<tr>
																		  <td>Sep 2022</td>
																		  <td>2</td>
																		  <td>2</td>
																		</tr>
																		<tr>
																		  <td>Nov 2022</td>
																		  <td>1</td>
																		  <td>1</td>
																		</tr>
																		<tr>
																		  <td>Dec 2022</td>
																		  <td>2</td>
																		  <td>2</td>
																		</tr>
																		<tr>
																		  <td>Feb 2023</td>
																		  <td>1</td>
																		  <td>1</td>
																		</tr>
																		<tr>
																		  <td>Mar 2023</td>
																		  <td>1</td>
																		  <td>1</td>
																		</tr>
																	  </tbody>
																	</table>
																  </div>
																</div>
															  </div>
															  <div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 747px; white-space: nowrap; font-family: Arial; font-size: 12px; font-weight: bold;">View/Time Chart
															  </div>
															  <div>

															  </div>
															</div>
														  </div>

														  <h4 class="secDivider">  Conversions</h4>
														  <ul class="clearfix bidStats">
															  <li>
																  <div class="statBox">
																	  <span>Total Cummulative Points</span> <strong id="" class="focus">6</strong>
																  </div>
															  </li>
															  <li>
																  <div class="statBox">
																	  <span># of Hours attend</span> <strong id="" class="focus">0</strong>
																  </div>
															  </li>
														  </ul>
														  <h3 class="secDivider clearfix">
															  <div class="pull-right">
																  <div class="btn-group">
																	  <button id="serviceOvwMonth" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  Last 30 Days</button>
																	  <button id="serviceOvwYear" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  Year</button>
																	  <button id="serviceOvwAlltime" class="btnGrayFlat btn-small" onclick="javascript:return false;">
																		  All Time</button>
																  </div>
															  </div>
															  Activities Overview
														  </h3>
														  <table class="table simpleTable">
															  <thead>
																  <tr>
																	  <th>
																		  Activity name
																	  </th>
																	  <th>
																		  Points Achieved
																	  </th>
																	  <th>
																		  Last activity
																	  </th>
																	  <th>
																		  Conversions Rate
																	  </th>
																  </tr>
															  </thead>
															  <tbody id="bodyServiceOvw">
																<tr>
																  <td>
																	<a class="BlueLinks" href="">Cleaning

																	</a>
																  </td>
																  <td>0</td>
																  <td>0</td>
																  <td>0%</td>
																</tr>
																<tr>
																  <td>
																	<a class="BlueLinks" href="">Volunteer

																	</a>
																  </td>
																  <td>0</td>
																  <td>0</td>
																  <td>0%</td>
																</tr>
																<tr>
																  <td><a class="BlueLinks" href="">Bar </a>
																  </td>
																  <td>1</td>
																  <td>0</td>
																  <td>0%</td>
																</tr>
																<tr>
																  <td><a class="BlueLinks" href="">Hall  </a>
																  </td>
																  <td>0</td>
																  <td>0</td>
																  <td>0%</td>
																</tr>
															  </tbody>
														  </table>

													  </div>
													  </div>  <!--End Data Area-->
					</div>

				  </div>
				</div>

								 </div>
							   </div> <!--End Proect Card-->
							</div> <!--End col-->
						</div><!--End Row - project Info-->


					<!-- End container-fluid-->
				   </div>





				</div>

@endsection
