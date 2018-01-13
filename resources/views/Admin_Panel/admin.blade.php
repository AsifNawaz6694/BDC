@extends('layouts.index')
@section('content')

    <div class="page-content">
        <div class="row">
                <div class="col-md-6">                   
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>Funders
                            </div>                                        
                        </div>
                        <div class="portlet-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>                                
                                    <th>
                                        Funders
                                    </th>  
                                     <th>
                                        Email
                                    </th>    
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Gender
                                    </th>    
                                                                                                
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Funders as $key => $value)
                                    <tr>   
                                        <td>
                                             {{$value->name }}
                                        </td> 
                                        <td>
                                             {{$value->email }}
                                        </td>  
                                         <td>
                                        {{$value->profile->phone}}
                                        </td>                           
                                        <td>
                                        {{$value->profile->gender}}
                                        </td>                              
                                    </tr>
                                @endforeach                     
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                </div>
                <div class="col-md-6">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>Innovators
                            </div>                                        
                        </div>
                        <div class="portlet-body">
                            <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>                                
                                <th>
                                    Innovators
                                </th>  
                                <th>
                                    Email
                                </th>    
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Gender
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Innovators as $key => $value)
                                <tr>                                               
                                    <td>
                                         {{$value->name }}
                                    </td> 
                                    <td>
                                         {{$value->email }}
                                    </td>  
                                     <td>
                                    {{$value->profile->phone}}
                                    </td>                           
                                    <td>
                                    {{$value->profile->gender}}
                                    </td>                                                                          
                                </tr>
                            @endforeach                     
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET-->
                </div>
            </div>
    <div class="clearfix">
    </div>         
    </div>
@stop