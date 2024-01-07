<!-- JQuery min js -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--Internal  Chart.bundle js -->
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js') }}"></script>


<!-- Custom Scroll bar Js-->
<script src="{{ URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Rating js-->
<script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

<!-- P-scroll js -->
<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!-- Horizontalmenu js-->
<script src="{{ URL::asset('assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ URL::asset('assets/js/eva-icons.min.js') }}"></script>
<!-- Sticky js -->
<script src="{{ URL::asset('assets/js/sticky.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
<!-- Left-menu js-->
<script src="{{ URL::asset('assets/plugins/side-menu/sidemenu.js') }}"></script>
<!--Internal  index js -->
<script src="{{ URL::asset('assets/js/index.js') }}"></script>
<!-- Apexchart js-->
{{-- <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script> --}}
<!-- custom js -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('crudjs/crud.js') }}"></script>
<script src="{{asset('assets/js/table.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const menuItems = document.querySelectorAll('.side-menu__item'); // تحديد جميع عناصر القائمة الجانبية

menuItems.forEach(item => {
item.addEventListener('click', function() {
// إزالة الكلاس "active" من العناصر السابقة
const activeItem = document.querySelector('.side-menu__item.active');
if (activeItem) {
activeItem.classList.remove('active');
}

// إضافة الكلاس "active" إلى العنصر الحالي
this.classList.add('active');
});
});
</script>
@yield('js')
