@extends('backend.master')
@section('title', 'List Categories') )
@section('content')
<div class="ccm-layout-column" id="ccm-layout-column-36"><div class="ccm-layout-column-inner">
  <h1>Smartphones</h1>
  
  <div class="product_list">
    <div class="row">
      @foreach ($colors as $item_color)
        <div class="col-sm-3">
          <div class="product-hold" style="position: relative;">
            <a href="{{ route('admin.products.show', ['id' => $item_color->id]) }}">
              <div class="_img product">
                @if (count($item_color->images))
                  @if (strpos($item_color->images->first()['path'], 'http://') !== false)
                    <img class="img-responsive thumbnail" src="{{$item_color->images->first()['path']}}" style="margin: 0 auto;">
                  @else
                    <img class="img-responsive thumbnail" src="admin/images/products/{{$item_color->images->first()['path']}}" style="margin: 0 auto;">
                  @endif
                @else
                  <img class="img-responsive thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7Qsw_ECf6sVU8xTKXhSyfXlfgwHojXM_7JQxlB8N2sACGfeu2">
                @endif
              </div>
              <div class="_title text-center">{{ $item_color->color }}</div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection