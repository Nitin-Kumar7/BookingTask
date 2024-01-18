 @extends('layouts.app')

 @section('content')


 <div class="card mb-5">
 <div class="container contact-form">
        <div class="card-header bg-white border-0 d-flex align-items-center">
            <h4 class="card-title mb-0 flex-grow-1">Edit Booking </h4>
            <div class="ml-auto">
                <div class="form-check form-switch form-switch-right">
                    <a href="{{ route('bookings.index') }}">Back <i class="fa arrow-left"></i></a>
                </div>
            </div>
        </div>
     <form action="{{ route('bookings.update',$bookings->id) }}" method="post">
         @csrf
         @method('PUT')
         <div class="row border p-2">
             <div class="col-md-8 offset-2">
                 <div class="row">
                     <div class="form-group col-md-6">
                         <label for="name">Name:</label>
                         <input type="text" placeholder="Enter Your Name" class="form-control" name="name"
                             value="{{ old('name', $bookings->name) }}" required>
                         @error('name')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="form-group col-md-6">
                         <label for="email">Email:</label>
                         <input type="email" placeholder="Enter Your Email" class="form-control" name="email"
                             value="{{ old('email', $bookings->email) }}" required>
                         @error('email')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="form-group col-md-6">
                         <label for="booking_type">Booking Type:</label>
                         <select class="form-control" name="booking_type" required>
                             <option value="Full Day"
                                 {{ old('booking_type', $bookings->booking_type) == 'Full Day' ? 'selected' : '' }}>Full
                                 Day</option>
                             <option value="Half Day"
                                 {{ old('booking_type', $bookings->booking_type) == 'Half Day' ? 'selected' : '' }}>Half
                                 Day</option>
                         </select>
                         @error('booking_type')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="form-group col-md-6">
                         <label for="booking_date">Booking Date:</label>
                         <input type="date" class="form-control" name="booking_date"
                             value="{{ old('booking_date', $bookings->booking_date) }}" required>
                         @error('booking_date')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="form-group col-md-6">
                         <label for="booking_slot">Booking Slot:</label>
                         <select class="form-control" name="booking_slot" required>
                             <option value="Morning"
                                 {{ old('booking_slot', $bookings->booking_slot) == 'Morning' ? 'selected' : '' }}>
                                 Morning</option>
                             <option value="Evening"
                                 {{ old('booking_slot', $bookings->booking_slot) == 'Evening' ? 'selected' : '' }}>
                                 Evening</option>
                         </select>
                         @error('booking_slot')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="form-group col-md-6">
                         <label for="booking_time">Booking Time:</label>
                         <input type="time" class="form-control" name="booking_time"
                             value="{{ old('booking_time', $bookings->booking_time) }}" required>
                         @error('booking_time')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                 </div>

                 <h6 class="text-center">
                     <button class="btn btn-success" type="submit">Submit</button>
                 </h6>
             </div>

         </div>

     </form>
 </div>
 </div>

 @endsection