@extends('backend.master')
@section('title', 'List Categories') )
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ __('category.admin.show.title') }}</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th class="column-title col-md-2">{{ __('category.admin.table.id') }}</th>
										<th class="column-title col-md-2">{{ __('category.admin.table.name') }}</th>
										<th class="column-title col-md-2">{{ __('category.admin.add.parent_category') }}</th>
										<th class="column-title col-md-3">{{ __('category.admin.table.created_at') }}</th>
										<th class="column-title col-md-3">{{ __('category.admin.table.updated_at') }}</th>
									</tr>
								</thead>
								<tbody>
									<tr class="even pointer">
										<td>{{ $category->id }}</td>
										<td>{{ $category->name }}</td>
										<td>
											@if ( !empty($parrentCategory))
											{{ $parrentCategory->name }}
											@else
											{{ $category->parent_id }}
											@endif
										</td>
										<td>{{ $category->created_at }}</td>
										<td>{{ $category->updated_at }}</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
								<a href="{{ route('admin.categories.index') }}" class="btn btn-success">Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection