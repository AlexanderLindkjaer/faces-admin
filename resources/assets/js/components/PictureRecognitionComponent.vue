<template lang="html">
<div class="row">
  <div class="col-md-6">
    <webcam ref="webcam"></webcam>
    <button type="button" class="btn btn-success" @click="photo">Recognition</button>
  </div>
  <div class="col-md-6">
    <div class="pt-5">

    </div>
    <img :src="this.img" style="width:500px;height:400px;" />
  </div>
  <div class="col-md-6">
    <div class="pt-5">

    </div>
    <img :src="this.rec_img" style="width:500px;height:400px;" />
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
        axios.post('//172.104.129.28:5000/pic', bodyFormData,  {
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
</style>
