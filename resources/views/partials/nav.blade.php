<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" style="color: #fff;">KnowMyC2</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse navigation">
            <ul class="nav navbar-nav">

<!--                <li class="dropdown">-->
<!--                    <a href="#" id="logging" class="navigation dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">-->
<!--                        <i class="glyphicon glyphicon-level-up"> </i>-->
<!--                        Logging-->
<!--                        <span class="caret"></span>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li @if (isset($log_drug)) class='active' @endif><a href="#" class="btn_subpage sidebarlink " parent-nav="logging" data-url="inventory/log-drug"><i class="glyphicon glyphicon-level-up"> </i> LOG A PRESCRIPTION    </a></li>-->
<!--                        <li @if (isset($log_broken)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" parent-nav="logging" data-url="inventory/broken"><i class="glyphicon glyphicon-wrench"> </i> LOG BROKEN/EXPIRED PILL </a></li>-->
<!--                        <li @if (isset($check_script)) class='active' @endif><a href="#" class="btn_subpage sidebarlink" parent-nav="logging" data-url="inventory/check-script"><i class="glyphicon glyphicon-search"> </i> CHECK SCRIPT </a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li><a href="/students" class="btn_subpage navigation" data-url="/students"><i class="glyphicon glyphicon-level-up"> </i> Students</a></li>
                <li><a href="/sections" class="btn_subpage navigation" data-url="/sections"><i class="glyphicon glyphicon-level-up"> </i> Sections</a></li>
                <li><a href="/reports" class="btn_subpage navigation" data-url="/reports"><i class="glyphicon glyphicon-level-up"> </i> Reports</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li class="dropdown">
                    <div style="color: #fff;font-size: 1.2em;padding: 10px;"><i class="glyphicon glyphicon-user"></i> My Account <span class="caret"></span></div>
                    <ul class="dropdown-menu">
                        @if(isset($admin) && Auth::user()->rights <= $admin)
                        <li><a href="#" class="admin-access" url="my-account"><i class="glyphicon glyphicon-inbox"></i> Information</a></li>
                        <li role="separator" class="divider"></li>
                        @endif
                        <li><a href="/auth/logout">Sign out</a></li>
                    </ul>
                </li>
                @else
                <li><a href="/auth/login"> Sign In </a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

@section('modal1')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Log a Drug</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Scan or Type NDC">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> NDC </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Dispensed QTY">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> Quantity </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Type RX#">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> RX # </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="text" class="form-control date" id="dispenseddate" placeholder="Dispensed Date">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Dispensed Date </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="text" class="form-control date" id="writtendate" placeholder="Date written">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Written </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <select>
                                <option>Select Pharmacist</option>
                            </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> RX # </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <select>
                                <option>Select technician</option>
                            </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> RX # </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> RX Dispensing part 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Return to stock
                        </label>
                    </div>

                    <div class="bs-callout bs-callout-danger" style="position: relative;">
                        <div class="form-control-static">Dispensed QTY: 23</div>
                        <div class="form-control-static">Drug NDC: Eat like this</div>
                        <div class="form-control-static">Drug Schedule: September 27 Every Day</div>
                        <div class="form-control-static">Prescription Number: 53234</div>
                        <div class="form-control-static">Previous SOH: Display previous SOH here</div>
                        <div class="form-control-static">New SOH: Display new SOH here</div>
                        <img src="#" style="position: absolute;top: 30px; right: 20px;width: 150px;"/>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg">LOG IT</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="expiredModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Log a Broken or Expired Pill</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Scan or Type NDC">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> NDC </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Dispensed QTY">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> Quantity </label>
                    </div>
                    <div class="form-group">

                        <div class="col-sm-5">
                            <input type="text" class="form-control date" id="dispenseddate" placeholder="Dispensed Date">
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Dispensed Date </label>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-5">
                            <select>
                                <option>Broken</option>
                            </select>
                        </div>
                        <label for="inputEmail3" class="col-sm-7 control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-paperclip"></i> RX # </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> RX Dispensing part 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Return to stock
                        </label>
                    </div>
                    <!--                    <div id="filter-container" style="position: relative;">-->
                    <div class="form-control-static">Dispensed QTY: 23</div>
                    <div class="form-control-static">Drug NDC: Eat like this</div>
                    <div class="form-control-static">Drug Schedule: September 27 Every Day</div>
                    <div class="form-control-static">Prescription Number: 53234</div>
                    <div class="form-control-static">Previous SOH: Display previous SOH here</div>
                    <div class="form-control-static">New SOH: Display new SOH here</div>
                    <!--                        <img src="#" style="position: absolute;top: 30px; right: 20px;width: 150px;"/>-->
                    <!--                    </div>-->

                </form>

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block">LOG IT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkdrugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Check a Drug or Script</h4>
            </div>
            <div class="modal-body">
                <div class="jumbotron text-center">
                    <h3>Drug NDC</h3>
                    <h4>Script #</h4>
                </div>
                <div id="filter-container" style="position: relative;">
                    <div class="form-control-static">Dispensed QTY: 23</div>
                    <div class="form-control-static">Drug NDC: Eat like this</div>
                    <div class="form-control-static">Drug Schedule: September 27 Every Day</div>
                    <div class="form-control-static">Prescription Number: 53234</div>
                    <div class="form-control-static">Previous SOH: Display previous SOH here</div>
                    <div class="form-control-static">New SOH: Display new SOH here</div>
                    <img src="#" style="position: absolute;top: 30px; right: 20px;width: 150px;"/>
                </div>


            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block">PRINT IT</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="logVerificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Check a Drug or Script</h4>
            </div>
            <div class="modal-body">
                <h2>You are logging a new drug quantity</h2>
                <div><strong>Drug NDC: </strong><span>Display drug NDC HERE</span></div>
                <div><strong>Drug Name: </strong><span>Display drug name HERE</span></div>
                <hr/>
                <div><strong>Previous SOH: </strong><span>Display Previous SOH HERE</span></div>
                <div><strong>New SOH: </strong><span>Display New SOH HERE</span></div>
                <hr/>
                <div><strong>Date Dispensed: </strong><span>March 28, 1983</span></div>
                <div><strong>Date Written: </strong><span>March 28, 1983</span></div>
                <div><strong>Pharmacist: </strong><span>Display selected Pharmacists HERE</span></div>
                <div><strong>Technician: </strong><span>Display selected Technician HERE</span></div>
                <div><strong>Dispensed QTY: </strong><span>284 Quantity dispensed</span></div>
                <div><strong>Drug Schedule: </strong><span>Display Drug Schedule</span></div>
                <div><strong>Prescription & Display RX#: </strong><span>Here won't display if the log is for Broken Pill or RTS</span></div>


            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block">LOG IT</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addDrugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">ADD A DRUG</h4>
            </div>
            <div class="modal-body">
                <!--                <form id="new_drug_frm" action="">-->
                {!! Form::open(['url' => 'inventory', 'id' => 'new_drug_frm']) !!}
                <div id="new_drug">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ndc" name="ndc" value="{{ old('ndc') }}" placeholder="Enter the NDC">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the drug name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="rx_no" name="rx_no" value="{{ old('rx_no') }}" placeholder="Enter the RX #">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="Manufacturer">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prescription" name="prescription" value="{{ old('prescription') }}" placeholder="Prescription">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="script_no" name="script_no" value="{{ old('script_no') }}" placeholder="script_no">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"> Beginning inventory </label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="1000">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Date Dispensed </label>
                        <input type="date" class="form-control date" id="date_dispensed" name="date_dispensed" value="{{ old('date_dispensed') }}" placeholder="Date Dispensed">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="control-label text-left" style="text-align: left;"><i class="glyphicon glyphicon-calendar"></i> Drug Schedule </label>
                        <input type="date" class="form-control date" id="drug_schedule" name="drug_schedule" value="{{ old('drug_schedule') }}" placeholder="Drug Schedule">
                    </div>
                </div>

                <div id="verify">
                    <h2>You are logging a new drug quantity</h2>
                    <div><strong>Drug NDC: </strong><span id="ndc_span">Display drug NDC HERE</span></div>
                    <div><strong>Drug Name: </strong><span id="name_span">Display drug name HERE</span></div>
                    <hr/>
                    <div><strong>Previous SOH: </strong><span id="soh_span">Display Previous SOH HERE</span></div>
                    <div><strong>New SOH: </strong><span id="new_soh_span">Display New SOH HERE</span></div>
                    <hr/>
                    <div><strong>Date Dispensed: </strong><span id="date_dispensed_span">March 28, 1983</span></div>
                    <div><strong>Date Written: </strong><span id="date_written_span">{{ date('Y-m-d H:i:s') }}</span></div>
                    <div><strong>Pharmacist: </strong><span id="pharmacists_span">@if (Auth::check()) {{ Auth::user()->pharmacist->fname }} @endif</span></div>
                    <!--                        <div><strong>Technician: </strong><span id="technician_span">Display selected Technician HERE</span></div>-->
                    <div><strong>Manufacturer: </strong><span id="manufacturer_span">Display Manufacturer HERE</span></div>
                    <div><strong>Prescription: </strong><span id="prescription_span">Display Prescrition HERE</span></div>
                    <div><strong>Script #: </strong><span id="script_no_span">Display Script No. HERE</span></div>
                    <div><strong>Dispensed QTY: </strong><span id="quantity_span">284 Quantity dispensed</span></div>
                    <div><strong>Drug Schedule: </strong><span id="drug_schedule_span">Display Drug Schedule</span></div>
                    <div><strong>Prescription & Display RX#: </strong><span id="rx_span">Here won't display if the log is for Broken Pill or RTS</span></div>
                </div>

                {!! Form::close() !!}
                <!--                </form>-->

            </div>
            <div class="modal-footer">
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block" id="add_drug">ADD IT</button>
            </div>
        </div>
    </div>
</div>

@stop