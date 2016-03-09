<?php
/**
 * Created by PhpStorm.
 * User: randson
 * Date: 08/03/16
 * Time: 00:38
 */
?>



<!-- page content -->
<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Plain Page</h3>
                </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="">
                        <div class="x_title">
                            <h2>Plain Page</h2>

                            <div class="clearfix"></div>

                            <div class="x_panel" style="">

                                <div class="x_content">
                                    <form action="historico" method="post">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" name="historico[data1]" class="form-control has-feedback-left" id="single_cal2" placeholder="Data inicial" aria-describedby="inputSuccess2Status">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess1Status" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" name="historico[data2]" class="form-control has-feedback-left" id="single_cal1" placeholder="Data final" aria-describedby="inputSuccess2Status">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Buscar</button>
                                            </div>
                                        </div>

                                    </form>


                                    <div class="row">



                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </div>



</div>
<!-- /page content -->


<!-- datepicker -->
<!-- datepicker -->

<!-- /datepicker -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#single_cal1').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_3"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

