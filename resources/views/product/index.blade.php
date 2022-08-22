@extends('layouts.app')
@section('content')
    <table class="checkbox-datatable table table-hover nowrap" style="width: 100%; background-color: #CCFFFF">
        <thead style="background-color: #FFCC33">
            <tr>
                <th>Ảnh</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Thời gian tạo</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            @if (!empty($products))
                @foreach ($products as $key => $item)
                    <tr>
                        <td style="font-size: 16px">
                            <img @if ($item->image) {{ $item->image }}
                                src = "images/product/{{ $item->image }}"
                                @else src = "images/product/defaut.jpg" @endif
                                style="width: 40px; height: 40px; margin-left: 25%">
                        </td>
                        <td style="font-size: 16px" style="font-size: 16px">{{ $item->code }}</td>
                        <td style="font-size: 16px">{{ $item->name }}</td>
                        <td style="font-size: 16px">{{ $item->price }}</td>
                        <td style="font-size: 16px">{{ $item->created_at }}</td>

                        <td style="font-size: 16px; width: 100px;">
                            <div class="d-inline mr-2"> <a href="{{ route('products.edit', $item->id) }}"><i
                                        class="icon-copy fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                            <div class="d-inline ml-2 delete-product">
                                <form class="d-inline" action="{{ route('products.destroy', $item->id) }}" id="destroy-form-{{$item->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="col-6">
                                        <i onclick="destroyProduct({{$item->id}})"
                                            class="fas fa-solid fa-trash"></i>
                                    </div>
                                </form>

                            </div>
                        </td class="row" style="width: 100px;">
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
@section('script')
<script>
    function destroyProduct(productId) {
        $('#destroy-form-' + productId).submit();
    }
</script>
@endsection
@section('style')
<style>
.delete-product {
    margin-left: 15px;
    position: absolute
}
</style>
@endsection
