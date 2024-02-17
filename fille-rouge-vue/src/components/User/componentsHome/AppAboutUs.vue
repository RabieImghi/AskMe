<template>
    <div class="sectionHome pe-4">
        <section class="QuestionSection shadow pt-4  py-4 ">
            <div class="border-bottom d-flex justify-content-between  container-mf pb-4">
                <span class="fw-bold text-secondary">Home / <span class="text-secondary-500"> About Us</span></span>  
            </div> 
            <section class="mt-4 container-mf aboutUs row ">
                <div class="context col mt-4">
                    <span class="h3 fw-bold">Our mission is to share and grow the world’s knowledge.</span>
                    <p class="text-secondary mt-3"> AskMe is to share and grow the world’s knowledge. A vast amount of the knowledge that 
                        would be valuable to many people is currently only available to a few — either locked in 
                        people’s heads, or only accessible to select groups. We want to connect the people who have 
                        knowledge to the people who need it, to bring together people with different perspectives so
                        they can understand each other better, and to empower everyone to share their knowledge 
                        for the benefit of the rest of the world.
                        <br> <br>
                        The potential of this is huge. If we can execute on our mission, we’re going to make a big 
                        impact on the world. We just need to get a smart group of people together that can get us there.
                    </p>
                </div>
                <div class="imageAbout col text-end">
                    <img src="../../../assets/img/auth.png" id="imageAuth" width="90%" class="p-3" alt="Image">
                </div>
            </section>
            <section class="mt-4 container-mf ">
                <div class="context mt-4 mb-4">
                    <span class="h3 fw-bold">Why Choosing DiscyOur Values. </span>
                    <div class=" mt-3 d row border-bottom pb-4" > 
                        <div class="about pt-4 col-5">
                            <span class="h4 pt-2 color-premary">1. Maximize long-term value</span>
                            <p class="text-secondary mt-2">We are building a product that we hope lasts 
                            forever. We want to be a strong and independent 
                            engine, this long term focus guides all of the 
                            decisions we make.
                            </p>
                        </div>
                        <div class="about pt-4 col-5">
                            <span class="h4 pt-2 color-premary">2. Continuously learn and adapt</span>
                            <p class="text-secondary mt-2">We value experimentation, metrics-driven decisions,
                                and speed of iteration. We push to production with 
                                every commit so we launch as soon as work is done 
                                and learn as quickly as possible.
                            </p>
                        </div>
                        <div class="about pt-4 col-5">
                            <span class="h4 pt-2 color-premary">3. Execute</span>
                            <p class="text-secondary mt-2">We value people who have great ideas but who 
                                also can quickly drive them all the way to bring 
                                their ideas into life.
                            </p>
                        </div>
                        <div class="about pt-4 col-5">
                            <span class="h4 pt-2 color-premary">4. Be direct and respectful</span>
                            <p class="text-secondary mt-2">We expect and welcome constant feedback. We trust 
                                each other to be open and straightforward, so if you 
                                have anything in mind don’t hesitate to call us.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            
            <footer>
                <p class="fw-bold text-secondary text-center p-2">© Copyright AskMe. All Rights Reserved <br>
                Designed by Rabie Ait Imghi</p>
            </footer>
        </section>
    </div>
</template>
<script>

    export default{
        name: 'AppHome',
    }
</script>
<style>
    .checkAuth{
        box-shadow: 0px -6px 10px lightgray;
    }
    .QuestionSection{
        background: white;
    }
    .statistiqueQuistion{
        background: #FDFEF9;
    }
    .about{
        width: 50%;
        min-width: 300px;
    }
</style>