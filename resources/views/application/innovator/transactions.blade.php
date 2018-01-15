@extends('layouts.panal_layout')
@section('content')

 <div class="wrapper">
        <div class="heading_one">
            <h1>Paypal transactions</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body ">
                        <h4 class="float-left text-left">Informations</h4>
                        <div class="list_border clearfix"></div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table id="transaction_table" class="table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transaction as $tr)
                                        <?php $description = json_decode($tr->description); ?>

                                    <tr>
                                        <td data-label="Transaction ID">PAY-{{ $tr->id }}</td>
                                        <td data-label="Details">{{ $tr->service->service }}</td>
                                        <td data-label="Amount">${{ $tr->service->cost }}</td>
                                        <td data-label="Date">{{ date("j-n-Y", strtotime($tr->created_at)) }}</td>
                                        <td data-label="Status">{{ $tr->request_service->status == 1 ? 'Complete' : 'Pending' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--./End Transaction Here -->
    </div>

@endsection