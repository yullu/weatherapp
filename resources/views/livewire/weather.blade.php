<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Weather Forecast</h3>
                <hr>
                <form wire:submit="fetchData">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Enter City</label>
                        <input type="text" class="form-control"  name="city" wire:model="city">
                        @error('city')
                        <div style="color: #FF0000">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Get Data</button>
                        <div wire:loading>
                            <svg wire:loading width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_P7sC{transform-origin:center;animation:spinner_svv2 .75s infinite linear}@keyframes spinner_svv2{100%{transform:rotate(360deg)}}</style><path d="M10.14,1.16a11,11,0,0,0-9,8.92A1.59,1.59,0,0,0,2.46,12,1.52,1.52,0,0,0,4.11,10.7a8,8,0,0,1,6.66-6.61A1.42,1.42,0,0,0,12,2.69h0A1.57,1.57,0,0,0,10.14,1.16Z" class="spinner_P7sC"/></svg>
                        </div>
                    </div>
                </form>
                <p>&nbsp;</p>
                <hr>
                <h6><i>Fetching weather data for :  {{ $city }} </i></h6>
                <hr>
                    <p><b>Todays Weather is: </b> <i>{{ $mainweather }} <b> & with </b> <i></i>{{ $weatherData }}</i></p>
                    <p><b>Current Temparature </b> <i>{{ $temp }}</i>°C</p>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>

</div>
