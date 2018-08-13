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
                @if ($item_color->path_image)
                  @if (strpos($item_color->path_image, 'https://'))
                    <img class="img-responsive thumbnail" src="{{$item_color->path_image}}" style="margin: 0 auto;">
                  @else
                    <img class="img-responsive thumbnail" src="{{ url('admin/images/products/'.$item_color->path_image) }}" style="margin: 0 auto;">
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
