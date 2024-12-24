@include('menu.sidebar')
<center>
  <form  method="POST" action="{{route('subtract')}}">
    @csrf
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="purchasecontainer">
      <div class="d-flex justify-content-end mt-4">
          <button type="submit"  class="savetn btn btn-success px-4 py-2">Purchase</button>
          <a  href="{{route('clear_session')}}" style="background-color:white;color:black" id="next" class="savetn2 btn btn-success px-4 py-2 ms-3">@if(session('m')) ✔
      @else
          !
      @endif
    </a>
      </div>
      <h2>Purchase now!</h2><br><br>
      <p id="clone-count">Your Item: 0</p>
      <div class="fluid-container " id="maincon">
        <div class="row">
          <div class="col-md-2">
            <input type="text" id="search-input" oninput="filterSelectOptions()" autocomplete="off" class="form-control" placeholder="Pick item..." style="height:30px;">
          </div>
          <div class="col-md-3">
            <div id="search-container">
              <select required name="id[]" class="form-select" id="options-select">
                <option value="">Select product</option>
                @foreach($datas as $data)
                  <option value="{{$data->id}}">{{$data->item}}-{{$data->quantity}} (₱{{ number_format($data->price, 2)}})</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <input required type="number" name="quantity[]" class="form-control" placeholder="Quantity">
          </div>
          <div class="col-md-3">
          <input type="text" placeholder="Price" class="form-control"  name="price[]" required>
          </div>
          <div class="col-md-1 btngroup d-flex justify-content-between">
            <button type="button" onclick="show()" class="addbtn btn btn-outline-primary ms-3" id="doplicate" title="Add more">
              <span class="bi bi-plus"></span>
            </button>
            <button type="button" class="removebtn btn btn-outline-danger ms-3" style="display:none" id="subtract" title="Remove">
              <span class="bi bi-dash"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</center>
@include('layout.purchasescript')
@include('layout.formscript')











    