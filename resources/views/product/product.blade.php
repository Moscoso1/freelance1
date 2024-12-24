<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_style/product1.css') }}">
    <title>Product Management</title>
    <style>
    </style>
</head>
<body>
    @include('menu.sidebar')
    <div class="container-fluid">
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-3">
                <div class="d1">
                    <center><img class="itemimg" src="{{ asset('image/item.png') }}" width="100px" height="100px"></center>
                    <form action="{{ (isset($editdatas)) ? route('saveUpdate', ['id' => $editdatas->id] ) : route('addProduct') }}">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <label for="product-name" class="ms-4 badge bg-info">Product name</label>
                                <input type="text" value="{{ (isset($editdatas)) ? $editdatas->item : '' }}" class="form-control ms-4 mt-1" id="product-name" name="item" required>
                            </div>
                        </div>
                            <input type="hidden" value="{{ (isset($editdatas)) ? $editdatas->barcode : '' }}" class="form-control ms-4 mt-1" id="barcode" name="barcode" required>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <label for="price" class="ms-4 badge bg-info">Price</label>                           
                                <input type="text" value="{{ (isset($editdatas)) ? $editdatas->price : '' }}" class="form-control ms-4 mt-1"  name="price" required>

                            </div>  
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <label for="quantity" class="ms-4 badge bg-info">Quantity</label>
                                <input type="number" value="{{ (isset($editdatas)) ? $editdatas->quantity : '' }}" class="form-control ms-4 mt-1" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 ms-4">
                                <label for="category" class="msn-2 badge bg-info">Category</label>
                                <select id="select" required style="width:100%" placeholder="Pick a category..." class="mt-1 form-select " name="category">
                                    <option value="{{ (isset($editdatas)) ? $editdatas-> category: ''}}">Select a category...</option>
                                    @foreach($category as $cat)
                                    <option value="{{ (isset($editdatas)) ? $cat-> category: $cat->category}}">{{ (isset($editdatas)) ?  $cat-> category: $cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success ms-4 ml-3 btn-sm">{{ (isset($editdatas) ? 'Update' : 'Save' )}}</button>
                        </div><br>
                    </form>
                </div>
            </div>
            <!-- Product List Section -->
            <div class="col-md-9">
                <div class="d2">
                    <h2 class="ms-4">Product List</h2>
                    <div class="container mt-3">
                        <div class="container d-flex justify-content-end">
                            <div class="input-group ml-5" style="width:50%">
                                <input type="text" class="form-control" id="searchInput" onkeyup="searchTable()" placeholder="Search..." aria-label="Search">
                            </div>
                        </div>
                    </div><br>
                    <div class="d-flex">
                    <div class="col-md-1 ms-3 ">
                        <select  class="form-select">
                            <option value="5">5 rows</option>
                            <option value="10">10 rows</option>
                            <option value="20">20 rows</option>
                            <option value="50">50 rows</option>
                        </select>
                        </div>
                        <div class="col-md-3 ms-3 ">
                        <button id="openModalBtn"  class="ms-1" style="height:32px;border-radius:5px;"><span class="bi bi-plus">Category</span></button> 
                        </div> 
                    </div>
                    <br><center>
                    <div class="tablediv">
                        <table class="table table-bordered table-hover" id="productTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th id="item" scope="col">Product name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            @forelse($datas as $data)
                                <tr class="tableRow" id="tr-{{ $data->id }}">
                                    <td id="tr-{{ $data->id }}">{{ $data->id }}</td>
                                    <td>{{ $data->item }}</td>
                                    <td>₱{{ number_format($data->price, 2) }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('editRead', $data->id) }}" title="edit">
                                            <i class="bi bi-pencil-square"></i> 
                                        </a>
                                        <a class="btn btn-danger btn-sm item-delete" data-id="{{ $data->id }}" title="delete">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <i class="bi bi-trash"></i> 
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data available!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </center>
                    <div id="paginationControls" class="pagination ms-3" style="width: 25%;">
                        <button id="prevPage" class="btn btn-outline-secondary btn-sm mr-2" disabled>
                            <i class="bi bi-chevron-left"></i> Previous
                        </button>
                        <span id="pageNumber" class="mx-2">Page 1</span>
                        <button id="nextPage" class="btn btn-outline-secondary btn-sm" disabled>
                            Next <i class="bi bi-chevron-right"></i>
                        </button>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span id="closeModalBtn" class="close">&times;</span>
        <form action="{{route('addCategory')}}" method="post">@csrf
        <h4>New category</h4>
        <input required type="text" name="category" class="form-control" placeholder="category name"><br>
        <div style="width:100%">
        <button style="height:30px;border-radius:5px;width:50px;float:right">save</button>
        </div>
        </form>
    </div>
  </div><br>
  <div class="bottomdiv d-flex"><img class="mt-2" src="{{ asset('image/wilfre.png') }}" width="50px" height="35px"><p class="mt-2" style="color: white"> Develop by Wilfre</p></div>
  @include('layout.modalscript')
@include('layout.script')

<style type="text/css">

</style>
</body>
</html>
