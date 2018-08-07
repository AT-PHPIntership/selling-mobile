@extends('backend.master')
@section('title', 'List Categories') )
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
      @include('backend.message')
      <div class="x_panel">
        <div class="x_title">
          <h2>{{  __('product.index.table-title') }}</h2>
          <div class="col-md-4 pull-right top_search">
            <form action="{{ route('admin.products.index') }}" method="GET">
              <div class="">
                <div class="col-md-10">
                  <input type="text" name="content" class="form-control" placeholder="{{ __('post.admin.list.search') }}">
                </div>
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">@lang('product.index.go')</button>
                </span>
              </div>
            </form>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title"> @lang('product.index.name')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_name') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-name-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_name'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-name-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_name'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title"> @lang('product.index.category')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_category') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-category_id-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_category'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-category_id-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_category'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title col-md-3"> @lang('product.index.preview') </th>
                  <th class="column-title"> @lang('product.create.quantity')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_quantity') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-quantity-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_quantity'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-quantity-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_quantity'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title"> @lang('product.index.avg_rating')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_avg_rating') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-avg_rating-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_avg_rating'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-avg_rating-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_avg_rating'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title"> @lang('product.index.price')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_price') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-price-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_price'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-price-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_price'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title"> @lang('product.index.status')
                    @if (app('request')->input('sortBy') == trans('product.index.sort_by_status') && app('request')->input('dir') == trans('product.index.dir_desc'))
                    <a id="sort-status-asc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_status'), 'dir' => trans('product.index.dir_asc')]) }}">
                      <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                    <a id="sort-status-desc" href="{{ route('admin.products.index', ['content' => request('content'), 'page' => request('page'), 'sortBy' => trans('product.index.sort_by_status'), 'dir' => trans('product.index.dir_desc')]) }}">
                      <i class="fa fa-sort-down"></i>
                    </a>
                    @endif
                  </th>
                  <th class="column-title no-link last">
                    <span class="nobr"> @lang('product.index.action') </span>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr class="odd pointer">
                  <td class=" ">{{ $product->name }}</td>
                  <td class=" ">{{ $product->category->name }}</td>
                  <td class=" "><p class="description-text">{{ $product->preview }}</p></td>
                  <td class=" ">{{ $product->quantity }}</td>
                  <td class=" ">{{ $product->avg_rating }}</td>
                  <td class=" ">{{ number_format($product->price) }}</td>
                  <td class=" ">{{ $product->status >= 1 ? trans('common.available') : trans('common.unavailable') }}</td>
                  <td class=" last">
                    <a class="btn btn-primary col-md-3" href="{!! route('admin.products.edit', ['id' => $product['id']]) !!}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-primary col-md-3" href="{!! route('admin.products.editMeta', ['products' => $product['id']]) !!}"><i class="fa fa-stack-exchange"></i></a>
                    <form class="col-md-3" id="deleted{{ $product->id }}" action="{!! route('admin.products.destroy', ['id' => $product['id']]) !!}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-primary btn-danger" onclick="deleteRecord(event, {{ $product->id }})" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{ $products->render() }}
      </div>
    </div>
  </div>
</div>
@endsection