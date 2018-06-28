<template lang="html">
<div class="row">
  <div class="col-md-6">
    <div class="webcam-container">
      <img class="preview-img" :src="this.img"  />
      <webcam ref="webcam" :height="300" :width="400"></webcam>
    </div>
    <button type="button" class="btn btn-success d-block" @click="photo">Recognition</button>
  </div>
  <div class="col-md-6">
    <div class="">
      <img :src="this.rec_img"  />
    </div>
  </div>
  <div class="col-md-6">
    <div class="pt-5">

    </div>
  </div>



</div>
</template>

<script>
export default {
  data() {
      return {
          img: null,
          rec_img: null,
          file: null
      };
  },
  methods: {
      photo() {
          this.img = this.$refs.webcam.capture();

          this.recognition(this.img);
      },
      recognition(img)
      {
        var file = img;
        var bodyFormData = new FormData();
        var self = this;

        bodyFormData.set('file', file);
        axios.post('https://faces-admin.wecode.dk:5000/pic', bodyFormData,  {
        headers: {
          'Content-Type': 'multipart/form-data'
          }
        })
        .then(function (response) {
          console.log(response);
          //outputImg.src = 'data:image/png;base64,'+response.data;
          self.rec_img = 'data:image/png;base64,'+response.data;
        })
        .catch(function (error) {
          toastr.error(error);
          console.log(error);
        });

      },

  },

}
</script>

<style lang="css">

.preview-img{
  position: absolute;
  top: 0;
  right: 0;
  height: 60px;
  width: 80px;
}

.webcam-container{
  display: inline-block;
  position: relative;
}
</style>
