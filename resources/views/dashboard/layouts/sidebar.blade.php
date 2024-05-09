  <!-- ========== Left Sidebar Start ========== -->
  <div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{route('dash')}}">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if(Auth::user()->user_type==1)
             
                <li>
                    <a href="{{route('user')}}">
                        <i class="dripicons-user"></i>
                        <span> User </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('trash')}}">
                        <i class="dripicons-trash"></i>
                        <span> Restore bin </span>
                    </a>
                </li>
                @endif 
            


</ul>

</div>
            </ul>

       
        </div>
     

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<style>
.arrow{
right: 30px;
position: absolute;
line-height: 26px;

}
.sh li{
line-height: 36px;

}
</style>