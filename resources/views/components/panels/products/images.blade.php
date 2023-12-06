@props(['car'])
<div class="col-span-3 border-r-0 sm:border-r pb-4 pr-4 text-center catalog-detail-slick-preview" data-slick-carousel-detail>
    <div class="mb-4 border rounded" data-slick-carousel-detail-items>


        <img class="w-full" src="{{ $car->image->url }}" alt="" title="">


        @foreach ($car->images as $image)
            <img class="w-full" src="{{ $image->url }}" alt="" title="">
        @endforeach

    </div>
    <div class="flex space-x-4 justify-center items-center" data-slick-carousel-detail-pager>
    </div>
</div>
