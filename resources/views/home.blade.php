@extends('layouts.app')
@extends('master')
@section('content')




    <div class="container">



        <div class="row">


            <script type="text/javascript">


                jQuery(document).ready(function($){

                    $(function() {
                        $("#datepicker").datepicker();
                        $("#datepicker").on('change',function(){
                            date = $(this).datepicker().val();

                            console.log(date);

                            $.ajax({
                                        method: 'get',
                                        url: '/home/ajax',
                                        data: {
                                            date:date



                                        }
                                    })
                                    .success(function(data) {
                                        $('#tableBody').html(data);

                                    });


                        });
                    });







                });






            </script>






            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <form action="{{route('homeArray')}}" method="post">
                        <div class="panel-heading">Dashboard</div>
                        <div class="col-md-12 margin20">

                            <p>Date: <input type="text" class="txtDate" name="txtDate" id="datepicker"/>
                                <!-- <input type="hidden" name="haha" value="haha"/> -->

                        </div>

                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-bordered">

                                    <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Hours</th>
                                    <th></th>
                                    </thead>
                                    <tbody id="tableBody">

                                    </tbody>




                                </table>




                                <input type ="submit"/>
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




@endsection

