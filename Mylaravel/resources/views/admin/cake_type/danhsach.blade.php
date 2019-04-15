@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">CakeType
                            <small>List</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Id</th>
                                <th>Name</th>
                                <th>descriptiom</th>
                                <th>image</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cakeType as $ct)
                            <tr class="even gradeC" align="center">
                                <th>{{$ct->id}}</th>
                                <th>{{$ct->name}}</th>
                                <th>{{$ct->description}}</th>
                                <th>
                                    <img width="200px" height="150px" src="source/image/product/{{$ct->image}}" alt="">
                                </th>
                                <th>{{$ct->created_at}}</th>
                                <th>{{$ct->updated_at}}</th>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/cake_type/xoa/{{$ct->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/cake_type/sua/{{$ct->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
