<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                {{--

                <a class="btn btn-primary" href="login.html">Logout</a>
                --}}
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <a href="javascript:void(0);"  onclick="event.preventDefault();document.getElementById('logout-form').submit()"
                   class=" btn btn-primary">Logout</a>
                <form action="{{route('logout')}}" method="post" id="logout-form" class="d-none">
                    @csrf
                </form>


            </div>
        </div>
    </div>
</div>