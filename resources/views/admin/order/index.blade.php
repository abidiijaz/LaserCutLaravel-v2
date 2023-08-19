@extends('layouts.admin.app')
@section('mytitle','Dashboard')
@section('content')
<style>
    select option {
    background: #626263;
    color: #fff;
    }
    .abi-custom-subcate{
        background: rgba(0, 0, 0, 0.3);
    }
</style>
<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between mb-2">
                                    <ul class="nav nav-tabs b-none">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>All Orders List</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">View All Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <!--<th>#</th>-->
                                                <th>Order ID</th>
                                                <th>Cus Name</th>
                                                <th>Total amount</th>
                                                <th>Order Date</th>
                                                <th>Phone No</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td class="text-capitalize">{{ $order->user->name }}</td>
                                                    <td>{{ $order->grand_total }}</td>
                                                    <td class="text-capitalize">{{ $order->created_at }}</td>
                                                    <td class="text-capitalize">{{ $order->phone }}</td>
                                                    <td class="text-capitalize">{{ $order->s_address }}</td>
                                                    <td>@include("components.admin.order_status")</td>
                                                    <td class="d-flex">
                                                        <form action="/admin/edit-order" method="post" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                                            <button class="btn btn-primary btn-sm">Edit</button>
                                                        </form>
                                                        |  <form action="/admin/delete-category" method="post" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $order->id }}">
                                                            <button class="btn btn-danger btn-sm">Del</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Cus Name</th>
                                                <th>Total amount</th>
                                                <th>Order Date</th>
                                                <th>Phone No</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                   $('#example').DataTable({
                       scrollX: true,
                       responsive: true
                   });
               });
       </script>
@endsection
