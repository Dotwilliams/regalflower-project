@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_pg = App\Models\Product::groupBy('product_tags_pg')->select('product_tags_pg')->get();
@endphp




     <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">

<div class="tag-list">

@if(session()->get('language') == 'Pidgin')

@foreach($tags_pg as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_pg) }}">
	{{ str_replace(',',' ',$tag->product_tags_pg)  }}</a>
@endforeach

 @else

@foreach($tags_en as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
	{{ str_replace(',',' ',$tag->product_tags_en)  }}</a>
@endforeach

  @endif

	 </div>
<!-- /.tag-list -->
</div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
