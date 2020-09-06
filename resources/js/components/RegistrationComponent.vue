<template>
    <div id="register">
      <div class="alert alert-info" id="alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="alert_message"></span>
      </div>
        <form @submit.prevent="register" @keydown="form.onKeydown($event)">
        <div class="form-group">
          <label>Name</label>
          <input v-model="form.name" type="text" 
            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
          <has-error :form="form" field="name"></has-error>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input v-model="form.email" type="email" name="email"
            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
          <has-error :form="form" field="email"></has-error>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label>Division</label>
                  <select v-model="form.division_id"  name="division_id"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('division_id') }" @change="getDistrict" id="division">
                    <option>Select Division</option>
                    <option v-for="(division,index) in divisions" :value="division.id">{{ division.division_name }}</option>
                    </select>
                  <has-error :form="form" field="division_id"></has-error>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                  <label>District</label>
                  <select v-model="form.district_id"  name="district_id"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('district_id') }" id="district" @change="getUpazila">
                    <option>Select District</option>
                    </select>
                  <has-error :form="form" field="district_id"></has-error>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Upazila</label>
                  <select v-model="form.upazila_id"  name="upazila_id"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('upazila_id') }" id="upazila">
                    <option>Select Upazila</option>
                    </select>
                  <has-error :form="form" field="upazila_id"></has-error>
                </div>
            </div>
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea v-model="form.address" type="text" name="address"
            class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
        </textarea>
          <has-error :form="form" field="address"></has-error>
        </div>
        <div class="row cloned-row">
            <div class="col-md-2">
                <div class="form-group">
                  <label>Exam Name</label>
                  <select v-model="form.exam_id"  
                    class="form-control" :class="{ 'is-invalid': form.errors.has('exam_id') }">
                    <option>Select Exam</option>
                    <option v-for="(exam,index) in exams" :value="exam.id">{{ exam.exam_name }}</option>
                    </select>
                  <has-error :form="form" field="exam_id"></has-error>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label>University Name</label>
                  <select v-model="form.university_id"  name="university_id" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('university_id') }">
                    <option>Select University</option>
                    <option v-for="(university,index) in universities" :value="university.id">{{ university.university_name }}</option>
                    </select>
                  <has-error :form="form" field="university_id"></has-error>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label>Board Name</label>
                  <select v-model="form.board_id"  name="board_id"  
                    class="form-control" :class="{ 'is-invalid': form.errors.has('board_id') }">
                    <option>Select Board</option>
                    <option v-for="(board,index) in boards" :value="board.id">{{ board.board_name }}</option>
                    </select>
                  <has-error :form="form" field="board_id"></has-error>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Result</label>
                    <input type="text" v-model="form.result" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Add More</label>
                    <button class="btn btn-info" @click="incrementEducation" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-danger" type="button" @click="deleteEducation"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Image</label>
                <div class="form-group">
                    <input @change="takePhoto" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                    <has-error :form="form" field="photo"></has-error>
                </div>
            </div>
            <div class="col-md-6">
                <label>Your Cv</label>
                <div class="form-group">
                    <input @change="takeCv" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('cv') }">
                    <has-error :form="form" field="cv"></has-error>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Language Proficiency</label><br>
                    <select v-model="form.language" id="" class="form-control">
                        <option value="Bangla">Bangla</option>
                        <option value="English">English</option>
                        <option value="French">French</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Training</label><br>
                       <select  id="training" class="form-control" @change="openTraining">
                          <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="training" style="display: none;">
                  <div class="form-group">
                    <label for="">Training Name</label>
                    <input type="text" v-model='form.training_name' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Training Details</label>
                    <textarea  v-model='form.training_details' class="form-control"></textarea> 
                  </div>
                </div>
            </div>
        </div>

        <button :disabled="form.busy" type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Registration Component')
            this.getAllDivision();
            this.getAllExam();
            this.getAllUniversity();
            this.getAllBoard();
        },
        data(){
            return {
                divisions : [],
                exams : [],
                universities : [],
                boards : [],
                form : new Form({
                    name : '',
                    email : '',
                    division_id : '',
                    district_id : '',
                    upazila_id : '',
                    address : '',
                    exam_id : '',
                    university_id : '',
                    board_id : '',
                    result : '',
                    photo : '',
                    cv : '',
                    training_name : '',
                    training_details : '',
                    language : '',
                })
            }
        },
        methods : {
            register(){
              console.log(this.form);
              this.form.busy = true;
              this.form
                .post("/api/register")
                .then(response => {
                  if (this.form.successful) {
                    $('#alert').show();
                    $('#alert_message').text(response.data.message);
                    this.form.reset();
                    this.form.clear();
                  } else {
                    console.log('Something Wrong');
                  }
                })
                
            },
            getAllDivision(){
                axios.get('/api/all_division').then(response=>{
                    this.divisions = response.data;
                }).catch(error=>{
                   console.log(error);
                });
            },
            getDistrict(){
                $('#district') .find('option') .remove() .end() .append('<option value="">Select District</option>');
                var id = document.getElementById('division').value;
                axios.get(`/api/get_district/${id}`)
                .then(function (response) {
                    var list = response.data;
                     var select = document.getElementById("district");
                     let i = 0;
                    for(i = 0; i < list.length ;i ++){
                        var el = document.createElement("option");
                        var districts = list[i];
                        var districtName = districts.district_name;
                        var districtId = districts.id;
                        el.textContent = districtName;
                        el.value = districtId;
                        select.appendChild(el);
                    }
                });
            },
            getUpazila(){
                $('#upazila') .find('option') .remove() .end() .append('<option value="">Select Upazila</option>');
                var id = document.getElementById('district').value;
                axios.get(`/api/get_upazila/${id}`)
                .then(function (response) {
                    var list = response.data;
                     var select = document.getElementById("upazila");
                     let i = 0;
                    for(i = 0; i < list.length ;i ++){
                        var el = document.createElement("option");
                        var upazilas = list[i];
                        var upazilaName = upazilas.upazila_name;
                        var upazilaId = upazilas.id;
                        el.textContent = upazilaName;
                        el.value = upazilaId;
                        select.appendChild(el);
                    }
                });
            },
            getAllExam(){
                axios.get('/api/all_exam').then(response=>{
                    this.exams = response.data;
                }).catch(error=>{
                   console.log(error);
                });
            },
            getAllUniversity(){
                axios.get('/api/all_university').then(response=>{
                    this.universities = response.data;
                }).catch(error=>{
                   console.log(error);
                });
            },
            getAllBoard(){
                axios.get('/api/all_board').then(response=>{
                    this.boards = response.data;
                }).catch(error=>{
                   console.log(error);
                });
            },
            incrementEducation(){
                $(".cloned-row:first").clone().insertAfter(".cloned-row:last");
            },
            deleteEducation(){
                $(".cloned-row:last").remove();
            },
            takePhoto(){
                let file = event.target.files[0];
                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.photo = event.target.result
                     };
                     reader.readAsDataURL(file);
                 }
            },
            takeCv(){
                let file = event.target.files[0];
                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.cv = event.target.result
                     };
                     reader.readAsDataURL(file);
                 }
            },
            openTraining(){
              let value = document.getElementById('training').value;
              if(value == 'yes'){
                $('.training').show();
              } else if(value == 'no'){
                $('.training').hide();
              }
            },
        }
    }
</script>
