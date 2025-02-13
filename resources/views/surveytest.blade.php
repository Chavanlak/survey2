<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Food Feedback Survey</title>
    <style>
        body {
            background-color: #000080;
            color: aliceblue;
            text-align: left;
            padding-left: 60px;
            margin: 50px;
        }

        .emoji {
            font-size: 2rem;
            cursor: pointer;
            transition: transform 0.2s;
            margin: 1 1px;
        }

        .emoji:hover,
        .selected {
            transform: scale(1.3);
        }

        .emoji-group {
            display: flex;
            gap: 5px;
        }

        .required::after {
            content: "*";
            color: red;
            font-size: 20px;
        }

        /* p { margin-bottom: 15px; } */
    </style>
</head>

<body>
    <div>
        <div style="font-size: 20px">
            <p>Satisfaction Survey</p>
        </div>


        <form action="/surveytest" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group my-6" style="margin: auto">

                <select name="branches" id="">
                    <button type="button" class="btn btn-secondary dropdown-toggle my-3" data-bs-toggle="dropdown">
                        กรุณาเลือกสาขาที่คุณใช้บริการในครั้งนี้
                    </button>
                    @foreach ($branch as $bb)
                    {{-- value มาจาก database เอา Location มา --}}
                        <option value={{ $bb->MBranchInfo_Code }}>{{ $bb->Location }}</option>
                    @endforeach
                    {{-- <option value="b1">ภูเก็ต</option>
                    <option value="b2">กรุงเทพ</option>
                    <option value="b3">นคร</option> --}}
                </select>


                {{-- <button type="button" class="btn btn-secondary dropdown-toggle my-3" data-bs-toggle="dropdown">
                    กรุณาเลือกสาขาที่คุณใช้บริการในครั้งนี้
                </button>
                <select name="branch" id="">
                    <option value="b1">สาขา1</option>
                    <option value="b2">สาขา1</option>
                    <option value="b3">สาขา1</option>
                </select> --}}
                {{-- <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button">สาขา1</button></li>
                    <li><button class="dropdown-item" type="button">สาขา2</button></li>
                    <li><button class="dropdown-item" type="button">สาขา3</button></li>
                </ul> --}}

            </div>
            {{-- <div class="my-3">
                <label for="">กรุณาเลือกสาขาในครั้งนี้</label>
                <select name="branches" id="" class="form-select">
                <option value="">กรุณาเลือกสาขา</option>
                @foreach ($branches as $branch)
                    <option value="">{{ $branch->location }}</option>
                    {{ $branch->location }}
                @endforeach
            </select>
            </div> --}}
            {{-- <div class="my-3">
                <label for="">กรุณาเลือกสาขาในครั้งนี้</label>
                <select name="branches" id="">
                <option value="">กรุณาเลือกสาขา</option>
                @foreach ($branches as $branch)
                    <option value="">{{ $branch }}</option>
                @endforeach
            </select>
            </div> --}}
            <div>

                <div class="form">
                    {{-- <form method="POST" action="/"></form> --}}
                    <label for="MemberID" class="required">ชื่อลูกค้า</label>

                    {{-- <input type="text" class="form-control me-2" name="name" placeholder="ชื่อลูกค้า"> --}}

                    <input type="text" class="form-control me-2" id="MemberID"name="name" placeholder="ชื่อลูกค้า">

                    <div class="d-grid gap-2"></div>
                </div>
                <div>
                    <label for="MemberID" class="required">เบอร์โทรลูกค้า</label>

                    {{-- <input type="text" class="form-control me-2" name="phone" placeholder="เบอร์โทรลูกค้า"> --}}

                    <input type="text" class="form-control me-2" id="MemberID"name="phone"
                        placeholder="เบอร์โทรลูกค้า">

                    <div class="d-grid gap-2"></div>
                </div>
                <div>
                    <label for="MemberID" class="form-label">อีเมล</label>
                    {{--
                    <input type="text" class="form-control me-2" name="email" placeholder="อีเมล"> --}}

                    <input type="text" class="form-control me-2" id="MemberID"name="email" placeholder="อีเมล">

                    <div class="d-grid gap-2"></div>
                </div>
            </div>




            <div class="my-3">
                <p>คุณภาพอาหาร (Food Quality)</p>
                  <input type="hidden" name="ques1" value="1">
                <label for="ans1">กรุณาเลือกคำตอบ</label>
                <select class="emoji-group" name="ch1" id="ans1">
                    <option class="emoji" value="1">😡</option>
                    <option class="emoji" value="2" selected>😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select>


            </div>

            <div class="my-3">
                <p>รสชาติอาหาร (Taste)</p>
                <input type="hidden" name="ques2" value="2">
                <label for="ans2">กรุณาเลือกคำตอบ</label>


                <select class="emoji-group" name="ch2" id="ans2">

                    <option class="emoji" value="1" selected>😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select>
            </div>

            <div class="my-3">
                <p>ความรวดเร็วในการให้บริการ (Speed of Service)</p>
                <input type="hidden" name="ques3" value="5">
                <label for="ans3">กรุณาเลือกคำตอบ</label>



                <select class="emoji-group" name="ch3" id="ans3">

                    <option class="emoji" value="1" selected>😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select>
            </div>
            <div class="my-3">
                <p>ความดูเเลเอาใจใส่ของพนักงาน (Service Mind)</p>
                <input type="hidden" name="ques4" value="6">
                <label for="ans4">กรุณาเลือกคำตอบ</label>



                <select class="emoji-group" name="ch4" id="ans4">

                    <option class="emoji" value="1" selected>😡</option>
                    <option class="emoji" value="2">😞</option>
                    <option class="emoji" value="3">😐</option>
                    <option class="emoji" value="4">😊</option>
                    <option class="emoji" value="5">😍</option>
                </select>
            </div>
            <div>
                <p>ข้อเสนอเเนะ</p>
                <div>
                    <textarea name="comment" id=""></textarea>
                </div>

            </div>
    </div>
    <div class="my-3">

        <input type="submit" value="submit">


    </div>
    </form>

    <script>
        document.querySelectorAll('.emoji-group').forEach(group => {
            group.addEventListener('click', function(event) {
                if (event.target.classList.contains('emoji')) {
                    group.querySelectorAll('.emoji').forEach(emoji => emoji.classList.remove('selected'));
                    event.target.classList.add('selected');
                }
            });
        });
    </script>
</body>

</html>
