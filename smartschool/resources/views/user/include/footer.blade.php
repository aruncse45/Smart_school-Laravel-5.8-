<div id="HJ" class="footer_top">
        <div style="" class="container">
          <div style=""  class="row">
            <div style="  " class="col-ld-3  col-md-6 col-sm-3">
              <div style="" class="single_footer_widget">
                <h3>CONTACT US</h3>
                <ul style="color: white; font-size: 18px" class="footer_widget_nav">
                  @foreach($contact_infos as $s)
                    <li><i class="far fa-address-book"></i>&nbsp;&nbsp;&nbsp;Address : {{$s->Address}}</li><br>
                    <li><i class="fas fa-mobile"></i>&nbsp;&nbsp;&nbsp; Mobile no : {{$s->Mobile}}</li><br>
                    <li><i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;Telephone No : {{$s->Telephone}}</li><br>
                    <li><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email : {{$s->Email}}</li><br>
                    <li><i class="fas fa-fax"></i>&nbsp;&nbsp;&nbsp;Fax : {{$s->Fax}}</li>
                  @endforeach
                  
                </ul>
              </div>
            </div>
            
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Important Links</h3>
                <ul class="footer_widget_nav">
                  <li><a target="_blank" href="http://www.nctb.gov.bd/">NCTB</a></li>
                  @foreach($links as $l)
                    <li><a target="_blank" href="{{$l->Link}}">{{$l->Link_name}}</a></li>
                    
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Social Links</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                  
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>

          </div>
        </div><br><br>
        <div align="center" style="color:white;  width: 50%; margin: auto;  ">@copywrite {{$about_us->School_name}} ALL RIGHTS RESERVED</div>

        <div  style="color:white;width: 20%; float: right; ">ARUN JONY JOYONTO</div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->
