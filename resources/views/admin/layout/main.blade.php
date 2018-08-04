<!-- HEader -->        
@include('admin.layout._header')    

<!-- Page content -->
<div class="page-content">
@include('admin.layout._sidebar') 
<!-- BEGIN Content -->
<div id="main-content">
    @yield('main_content')
</div>
    <!-- END Main Content -->

<!-- Footer -->        
@include('admin.layout._footer')  
</div>  
                
              