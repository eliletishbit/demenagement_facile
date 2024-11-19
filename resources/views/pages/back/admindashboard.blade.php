@extends('layouts.dashback')

@section('contenu_index_dash_admin')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Bienvenue {{Auth::user()->name;}}</h3>
              <h6 class="font-weight-normal mb-0">vous avez  <span class="text-primary"> 3 alerts non lus!</span></h6>
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-calendar"></i> 
                    <?php  $dateToday = date('Y-m-d');                          
                    // Afficher la date
                    echo "Date d'aujourd'hui : " . $dateToday;
                    ?> 
                    </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">January - March</a>
                    <a class="dropdown-item" href="#">March - June</a>
                    <a class="dropdown-item" href="#">June - August</a>
                    <a class="dropdown-item" href="#">August - November</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="{{asset('images/dashboard/people.png')}}" alt="people">
              <div class="weather-info">
                <div class="d-flex">
                  <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                  </div>
                  <div class="ms-2">
                    <h4 class="location font-weight-normal">Cotonou</h4>
                    <h6 class="font-weight-normal">Benin</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Demandes du jour</p>
                  <p class="fs-30 mb-2">4006</p>
                  <p>10.00% (30 jours)</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total des demandes</p>
                  <p class="fs-30 mb-2">61344</p>
                  <p>22.00% (30 jours)</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Nombre de chauffeurs</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>2.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Nombre de Clients</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>0.22% (30 jours)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">details demandes</p>
              <p class="font-weight-500">Le nombre total de demande par rapport au nombre de clients</p>
              <div class="d-flex flex-wrap mb-5">
                <div class="me-5 mt-3">
                  <p class="text-muted">Nombre de clients</p>
                  <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                </div>
                <div class="me-5 mt-3">
                  <p class="text-muted">Nombre de chauffeurs</p>
                  <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                </div>
                <div class="me-5 mt-3">
                  <p class="text-muted">Nombre d'utilisateurs</p>
                  <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                </div>
                
              </div>
              <canvas id="order-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="card-title">Rapport des ventes</p>
                <a href="#" class="text-info">Voir tout</a>
              </div>
              <p class="font-weight-500">Nombre de ventes en démenagement sur le nombre de vente en services connexes. </p>
              <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"></div>
              <canvas id="sales-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card position-relative">
            <div class="card-body">
              <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                        <div class="ml-xl-4 mt-3">
                          <p class="card-title">Details gains</p>
                          <h1 class="text-primary">$34040</h1>
                          <h3 class="font-weight-500 mb-xl-4 text-primary">Gains utilisateurs</h3>
                          <p class="mb-2 mb-xl-0">Le nombre total de gains (tous les services compris)</p>
                        </div>
                      </div>
                      <div class="col-md-12 col-xl-9">
                        <div class="row">
                          <div class="col-md-6 border-right">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                              <table class="table table-borderless report-table">
                                <tr>
                                  <td class="text-muted">gains chauffeurs</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td>
                                    <h5 class="font-weight-bold mb-0">713</h5>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-muted">gains services connexes</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td>
                                    <h5 class="font-weight-bold mb-0">583</h5>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="text-muted">gains admins</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td>
                                    <h5 class="font-weight-bold mb-0">924</h5>
                                  </td>
                                </tr>                                                                         
                              </table>
                            </div>
                          </div>
                          <div class="col-md-6 mt-3">
                            <div class="daoughnutchart-wrapper">
                              <canvas id="north-america-chart"></canvas>
                            </div>
                            <div id="north-america-chart-legend">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Liste des démenagements</p>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Search Engine Marketing</td>
                      <td class="font-weight-bold">$362</td>
                      <td>21 Sep 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Search Engine Optimization</td>
                      <td class="font-weight-bold">$116</td>
                      <td>13 Jun 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Display Advertising</td>
                      <td class="font-weight-bold">$551</td>
                      <td>28 Sep 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pay Per Click Advertising</td>
                      <td class="font-weight-bold">$523</td>
                      <td>30 Jun 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>E-Mail Marketing</td>
                      <td class="font-weight-bold">$781</td>
                      <td>01 Nov 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-danger">Cancelled</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Referral Marketing</td>
                      <td class="font-weight-bold">$283</td>
                      <td>20 Mar 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-warning">Pending</div>
                      </td>
                    </tr>
                    <tr>
                      <td>Social media marketing</td>
                      <td class="font-weight-bold">$897</td>
                      <td>26 Oct 2018</td>
                      <td class="font-weight-medium">
                        <div class="badge badge-success">Completed</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">To Do Lists</h4>
              <div class="list-wrapper pt-2">
                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                  <li>
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Meeting with Urban Team </label>
                    </div>
                    <i class="remove ti-close"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Duplicate a project for new customer </label>
                    </div>
                    <i class="remove ti-close"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Project meeting with CEO </label>
                    </div>
                    <i class="remove ti-close"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Follow up of team zilla </label>
                    </div>
                    <i class="remove ti-close"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-flat">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Level up for Antony </label>
                    </div>
                    <i class="remove ti-close"></i>
                  </li>
                </ul>
              </div>
              <div class="add-items d-flex mb-0 mt-2">
                <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="col-md-12 stretch-card grid-margin">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Notifications</p>
              <ul class="icon-data-list">
                <li>
                  <div class="d-flex">
                    <img src="{{asset('images/faces/face1.jpg')}}" alt="user">
                    <div>
                      <p class="text-info mb-1">Isabella Becker</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>9:30 am</small>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <img src="{{asset('images/faces/face2.jpg')}}" alt="user">
                    <div>
                      <p class="text-info mb-1">Adam Warren</p>
                      <p class="mb-0">You have done a great job #TW111</p>
                      <small>10:30 am</small>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <img src="{{asset('images/faces/face3.jpg')}}" alt="user">
                    <div>
                      <p class="text-info mb-1">Leonard Thornton</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>11:30 am</small>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <img src="{{asset('images/faces/face4.jpg')}}" alt="user">
                    <div>
                      <p class="text-info mb-1">George Morrison</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>8:50 am</small>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <img src="{{asset('images/faces/face5.jpg')}}" alt="user">
                    <div>
                      <p class="text-info mb-1">Ryan Cortez</p>
                      <p class="mb-0">Herbs are fun and easy to grow.</p>
                      <small>9:00 am</small>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Advanced Table</p>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="example" class="display expandable-table" style="width:100%">
                      <thead>
                        <tr>
                          <th>Quote#</th>
                          <th>Product</th>
                          <th>Business type</th>
                          <th>Policy holder</th>
                          <th>Premium</th>
                          <th>Status</th>
                          <th>Updated at</th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection