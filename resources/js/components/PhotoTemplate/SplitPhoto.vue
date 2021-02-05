<template>
  <div class="flex w-full">
      <div class="relative">
        <UploadImage
            :is-show="data_showUpload"
            @browse-image="func_browseImage('splitPhoto1')" 
            @get-image="func_imageLoader"/>
        <ProgressBar :is-show="data_showLoading"/>
        <canvas id="splitPhoto1" :width="364" :height="canvasSize.height">1</canvas>
        <ZoomRange @change-range="func_imageZoom" :is-show="data_showZoom"/>
      </div>
      <div class="relative">
        <UploadImage
            :label="'Photo 2'"
            :is-show="data_showUpload"
            @browse-image="func_browseImage('splitPhoto2')" 
            @get-image="func_imageLoader"/>
        <ProgressBar :is-show="data_showLoading"/>
        <canvas id="splitPhoto2" :width="364" :height="canvasSize.height">2</canvas>
        <ZoomRange @change-range="func_imageZoom" :is-show="data_showZoom"/>
      </div>
  </div>
</template>

<script>
import UploadImage from '../UploadImage';
import ZoomRange from '../ZoomRange';
import ProgressBar from '../ProgressBar'

export default {
    name: 'SplitPhoto',
    components: {
        UploadImage,
        ZoomRange,
        ProgressBar
    },
    props: {
        canvasSize: {
            type: Object,
            default: () => {},
            required: true
        }
    },
    data() {
        return {
            data_canvas: '',
            data_showUpload: true,
            data_showZoom: false,
            data_showLoading: false
        }
    },
    methods: {
        func_browseImage(canvas) {
            this.data_canvas = canvas;
            document.getElementById('browser-image').click();
        },
        func_imageLoader(e) {
            const reader = new FileReader();
            const canvas = new fabric.Canvas(this.data_canvas);
            this.data_showLoading = true;

            setTimeout(() => {
                reader.onload = (event) => {
                const imgObj = new Image();
                imgObj.src = event.target.result;

                imgObj.onload = () => {
                        const image = new fabric.Image(imgObj);

                        image.set({
                            left: 0,
                            top: 0,
                            padding: 0,
                            cornerSize: 0
                        });

                        canvas.add(image);
                        canvas.centerObject(image);
                        canvas.renderAll();
                        this.data_showUpload = false;
                        this.data_showLoading = false
                    }
                }
                reader.readAsDataURL(e.target.files[0]);
            }, 3000);
            
        },
        func_imageZoom(e) {
            const canvas = this.data_canvas;
            const activeImage = canvas._activeObject;
            const rangeValue = e.target.value - .9;


            activeImage.set({
                scaleX: rangeValue,
                scaleY: rangeValue,
                originX: "center", 
                originY: "center"
            });
            canvas.centerObject(activeImage);
            canvas.renderAll();

        },
    }
}
</script>

<style>

</style>