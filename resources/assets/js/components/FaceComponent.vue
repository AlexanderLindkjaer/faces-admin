<template lang="html">

  <div class=" col-md-4 col-sm-6 py-3 d-flex align-items-stretch">

    <div class="card w-100" style="">
      <div class="mx-auto">
        <img class="card-img-top image--cover" :src="face.url"  alt="Card image cap">
      </div>
      <div class="card-body bg-white">
        <h4 class="card-title">{{face.name}}</h4>
        <div class="hover" v-if="!edit_nickname" @click="edit_nickname = true">
          <p>AKA: <b>{{nickname}}</b> </p>
        </div>
        <div v-else class=" mb-1">
          <p class="mb-0">AKA: <input type="text" v-model="face.new_nick_name" > </p>
          <div class="small-btn">
            <div class="btn btn-primary" @click="saveNickname">Save</div>
            <div class="btn btn-warning text-white " @click="edit_nickname = false">Cancel</div>
          </div>
        </div>
        <h5>Shoutouts:</h5>
        <div v-for="shout in shoutouts" class="">
          <div class="hover" v-if="!shout.edit" @click="shout.edit = true">
            <small>- {{shout.shout}}</small>
          </div>
          <div v-else>
            <textarea v-model="shout.shout"></textarea>
              <div class="small-btn">
                <div class="btn btn-primary" @click="saveShout(shout)">Save</div>
                <div class="btn btn-danger" @click="deleteShout(shout)">Delete</div>
                <div class="btn btn-warning text-white " @click="cancelShoutEdit">Cancel</div>
              </div>
          </div>
        </div>
        <div class="pt-2" v-if="!new_state" @click="new_state = true">
          <div class="a-plus hover"></div>
        </div>
        <div class="pt-3" v-else>
          <textarea v-model="new_shout"></textarea>
            <div class="small-btn">
              <div class="btn btn-primary" @click="saveNewShout(shout)">Save</div>
              <div class="btn btn-warning text-white " @click="new_state = false">Cancel</div>
            </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>
  export default {

    props: {
      data_face: {
        required: true
      },
      new_state: false,
      new_shout: '',
    },

    data: function() {
      return {
        face: this.data_face,
        edit_nickname: false,
        shoutouts: []
      }
    },
    mounted(){
      this.loadShoutouts();
    },
    computed: {
        nickname: function () {
          if(this.face.nick_name) return this.face.nick_name;
          else return 'Unknown'
        },
    },
    methods: {
      saveNickname(){
        let formData = new FormData();
        formData.append('nick_name', this.face.new_nick_name);
        this.updateFace(formData);
        this.edit_nickname = false;

      },

      updateFace(formData){

        formData.append('id', this.face.id);
        var self = this


        axios.post('/faces/update', formData,   {
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
            })
            .then(function (response) {
              self.face = response.data;
              toastr.success('Face updated')
            })
            .catch(function (error) {
              toastr.error(error);
            });
      },

      loadShoutouts(){
        var self = this;
        axios.get('faces/'+this.face.id+'/shoutouts').then(function (response){
          self.shoutouts = response.data;
        });
      },

      cancelShoutEdit(){
        this.loadShoutouts();
      },

      saveShout(shout){
        var self = this;
        axios.post('/shout/update', shout)
            .then(function (response) {
              toastr.success('ShoutOut updated')
              self.loadShoutouts();
            })
            .catch(function (error) {
              toastr.error(error);
            });
      },

      deleteShout(shout){
        var self = this;
        axios.get('/shout/'+shout.id+'/delete').then(function (response){
          toastr.success('ShoutOut deleted')
          self.loadShoutouts();
        });
      },

      saveNewShout(){
        var self = this;

        let formData = new FormData();
        formData.append('face_id', this.face.id);
        formData.append('shout', this.new_shout);

        axios.post('/shout', formData)
            .then(function (response) {
              toastr.success('ShoutOut created')
              self.new_shout = "";
              self.loadShoutouts();
              self.new_state = false
            })
            .catch(function (error) {
              toastr.error(error);
            });
      }

    }



  }
</script>

<style lang="css">

.image--cover {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin: 20px;

  object-fit: cover;
  object-position: center right;
}

.card{
  background-color: lightcoral;
}

.small-btn .btn{
  padding: 3px;
  margin-top: 3px;
}

.hover{
  cursor: pointer;
  text-decoration:

}

.a-plus{
  width: 30px;
height: 30px;
position: relative;
margin: auto;
background-color: #353e45;
background-image: -webkit-gradient(linear, left top, left bottom, from(#617685), to(#21563d));
display: block;
clear: both;
margin: auto;
border-radius: 100%;
}

.a-plus::after{
  content: '';
font-style: normal;
position: absolute;
width: 100%;
height: 100%;
display: block;
background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/64/icon-add-f.svg);
background-repeat: no-repeat;
background-size: 30%;
background-position: center center;
left: 0;
top: 0;
}

</style>
