<template>
  <div class="relative">
      <UploadImage
        :is-show="data_showUpload"
        @browse-image="func_browseImage" 
        @get-image="func_imageLoader"/>
      <ProgressBar :is-show="data_showLoading"/>
      <canvas id="singlePhoto" :width="canvasSize.width" :height="canvasSize.height"></canvas>
      <ZoomRange @change-range="func_imageZoom" :is-show="data_showZoom"/>
  </div>
</template>

<script>
import UploadImage from '../UploadImage';
import ZoomRange from '../ZoomRange';
import ProgressBar from '../ProgressBar'

export default {
    name: 'SinglePhoto',
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
    mounted() {
        this.data_canvas = new fabric.Canvas('singlePhoto');
        this.func_imageSelected();
    },
    watch: {
        data_canvas(newValue) {
            this.data_canvas = newValue;
        }
    },
    methods: {
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
        func_browseImage() {
            document.getElementById('browser-image').click();
        },
        func_imageLoader(e) {
            const reader = new FileReader();
            const canvas = this.data_canvas;
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
                        this.data_showUpload = false;
                        this.data_showLoading = false
                    }
                }
                reader.readAsDataURL(e.target.files[0]);
            }, 3000);
            
        },
        func_imageSelected() {
            const canvas = this.data_canvas;
            canvas.on({
                'selection:created': (e) => {
                    this.data_showZoom = true;
                },
                'selection:cleared': (e) => {
                    this.data_showZoom = false;
                }
            });
            canvas.renderAll();
        }
    }
}
</script>

<style>

</style>