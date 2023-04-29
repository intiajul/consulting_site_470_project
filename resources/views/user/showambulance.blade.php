<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

      @foreach ($ambulance as $ambulances)

        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="ambulanceimage/{{$ambulances->image}}" alt="">
              
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$ambulances->name}}</p>
              <span class="text-sm text-grey">{{$ambulances->phone}}</span>
            </div>
          </div>
        </div>

      @endforeach 
        
      </div>
    </div>
  </div>