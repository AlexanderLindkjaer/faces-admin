<template lang="html">
  <div class="col-12 face-crud-bar py-2">
    <div class="btn btn-success" @click="openModal()">
      Create New Face
    </div>


    <modal name="face-crud" height="auto" :scrollable="true" >

      <form class="" enctype="multipart/form-data">
        <div class="row p-4">

          <div class="col-12">
            <h1>Create new face!</h1>
          </div>


          <div class="col-md-6 form-group">
            <label for="name">Name</label><br>
            <input class="form-control" type="text"  name="name" v-model="face.name" value="" required>
          </div>

          <div class="col-md-6 form-group">
            <label for="nick_name">Nick Name</label><br>
            <input class="form-control" type="text"  name="nick_name" v-model="face.nick_name" value="" >
          </div>

          <div class="col-md-6 form-group">
            <label for="img">Image</label><br>
            <input class="form-control" type="file" @change="previewImage" accept="image/*"  >
          </div>
          <div class="col-md-6">
            <div class="image-preview" v-if="face.image.length > 0">
                  <img class="preview" :src="face.image">
              </div>
          </div>

          <div class="col-12">
            <div class="btn btn-success" v-on:click="create()">
              Save face
            </div>
          </div>

        </div>
      </form>

    </modal>


  </div>
</template>

<script>
export default {
  data: function(){
    return {
      face: {
        image: ''
      }
    }
  },
  methods: {
    openModal(){
      this.$modal.show('face-crud');
    },

    closeModal(){
      this.$modal.close('face-crud');
    },

    previewImage: function(event) {
       // Reference to the DOM input element
       var input = event.target;
       // Ensure that you have a file before attempting to read it
       if (input.files && input.files[0]) {
           // create a new FileReader to read this image and convert to base64 format
           var reader = new FileReader();
           // Define a callback function to run, when FileReader finishes its job
           reader.onload = (e) => {
               // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
               // Read image as base64 and set to imageData
               this.face.image = e.target.result;
               this.face.img = input.files[0];
           }
           // Start the reader job - read file as a data url (base64 format)
           reader.readAsDataURL(input.files[0]);
       }
     },

    validate(){

      var validate = true;

      if(!this.face.name){
        toastr.error('Name required', 'Name Error');
        validate = false;
      }
      if(!this.face.image){
        toastr.error('Image required', 'Image Error');
        validate = false;
      }

      return validate;
    },

    create(){
      if(!this.validate()) return;

      let formData = new FormData();

      formData.append('nick_name', this.face.nick_name);
      formData.append('name', this.face.name);
      formData.append('img', this.face.img);


      axios.post('/faces', formData,   {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
          })
          .then(function (response) {
            window.location.href = window.location.href+'#face-created'
            location.reload();
          })
          .catch(function (error) {
            toastr.error(error);
          });

    }

  }

}
</script>

<style lang="css">


.face-crud-bar{

}
</style>

<style scoped>
  img {
  width: 80%;
  margin: auto;
  display: block;
  margin-bottom: 10px;
  }
</style>
