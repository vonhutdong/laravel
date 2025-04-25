@extends('dashboard') <!-- Nếu bạn dùng layout, hoặc thay bằng layout khác -->

@section('content')
<div class="container mt-4">
    <h2>Chi tiết đơn hàng #{{ $order_detail->first()->order_id ?? 'Không xác định' }}</h2>

    @if($order_detail->isEmpty())
        <div class="alert alert-warning mt-3">
            Không tìm thấy chi tiết đơn hàng.
        </div>
    @else
        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php $tongTien = 0; @endphp
                @foreach($order_detail as $index => $detail)
                    @php
                        $product = $products[$detail->id] ?? null;
                        $gia = $product->price ?? 0;
                        $thanhTien = $gia * $detail->quantity;
                        $tongTien += $thanhTien;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product ? $product->name : 'Sản phẩm không tồn tại' }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($gia, 0, ',', '.') }} đ</td>
                        <td>{{ number_format($thanhTien, 0, ',', '.') }} đ</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Tổng cộng:</th>
                    <th>{{ number_format($tongTien, 0, ',', '.') }} đ</th>
                </tr>
            </tfoot>
        </table>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection