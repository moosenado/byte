<h1>The place is available</h1>

<p>Date: {{ $date }}</p>

<p>Time: {{ $time }}</p>

<p>Size: {{ $capacity }}</p>


{!! Form::open(['url' => 'reserve', 'onsubmit' => 'return validate();']) !!}

{!! Form::hidden('date', $date) !!}

{!! Form::hidden('time', $time) !!}

{!! Form::hidden('capacity', $capacity) !!}

<ul>
    <li>
        {!! Form::label('fname', 'First name: ') !!}
        {!! Form::text('fname') !!}
    </li>
    <li id="fname-req" style="display: none; color: red;">
        *Required
    </li>
    <li>
        {!! Form::label('lname', 'Last name: ') !!}
        {!! Form::text('lname') !!}
    </li>
    <li id="lname-req" style="display: none; color: red;">
        *Required
    </li>
    <li>
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::text('email') !!}
    </li>
    <li id="email-req" style="display: none; color: red;">
        *Required
    </li>
    <li id="email-reg" style="display: none; color: red;">
        *Invalid
    </li>
    <li>
        {!! Form::label('phone', 'Phone: ') !!}
        {!! Form::text('phone') !!}
    </li>
    <li id="phone-req" style="display: none; color: red;">
        *Required
    </li>
    <li id="phone-reg" style="display: none; color: red;">
        *Invalid
    </li>
</ul>

{!! Form::submit('Reserve') !!}

{!! Form::close() !!}

<ul>
    @foreach($list as $table)
    <li>Table: {{ $table->id }}, cap={{ $table->capacity }}</li>
    @endforeach
</ul>

<script>
    function validate(){
        var tracker = true; 
        
        var fname = document.getElementById('fname');
        var lname = document.getElementById('lname');
        var email = document.getElementById('email');
        var phone = document.getElementById('phone');
        if(fname.value === '' || fname.value === null){
            document.getElementById('fname-req').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('fname-req').style.display = "none";
        }
        
        if(lname.value === '' || lname.value === null){            
            document.getElementById('lname-req').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('lname-req').style.display = "none";
        }
        
        if(email.value === '' || email.value === null){
            document.getElementById('email-req').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('email-req').style.display = "none";
        }
        
        if(phone.value === '' || phone.value === null){
            document.getElementById('phone-req').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('phone-req').style.display = "none";
        }
        
        var emailPattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        if(!emailPattern.test(email.value) && !(email.value === '' || email.value === null)){
            document.getElementById('email-reg').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('email-reg').style.display = "none";
        }
        
        var phonePattern = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
        if(!phonePattern.test(phone.value) && !(phone.value === '' || phone.value === null)){
            document.getElementById('phone-reg').style.display = "block";
            tracker = false;
        }
        else{
            document.getElementById('phone-reg').style.display = "none";
        }
        
        if(tracker === false){
            tracker = true;
            return false;
        }
        else{
            return true;
        }
    }
</script>
