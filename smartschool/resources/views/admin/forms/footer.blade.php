@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">FOOTER</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Link Name</th>
        <th>Link URL</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>

      @foreach ($links as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Link_name}}</td>
          <td>{{$p->Link}}</td>
          <td><a href="{{url('/update_link_page/'.$p->id)}}">UPDATE</a></td>
        </tr>
      @endforeach

    </tbody>
  </table>


@endsection