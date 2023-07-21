<script>
export default {

}
</script>


<template>
  <div class="w-full text-[1.5rem] font-bold tracking-wider">Shipping Address Information</div>
  <form action="#">
    <div class="flex gap-4 mt-6">
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="First Name" />
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Last Name" />
    </div>
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Address" />
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Apartment, suite, etc (optional)" />
    <div class="flex gap-4 mt-4">
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Country" />
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="City" />
      <input type="text" class="w-full py-3 border border-black pl-4" placeholder="Zipcode" />
    </div>
    <input type="text" class="w-full py-3 border border-black pl-4 mt-4" placeholder="Another information" />
    <div class="my-6 flex items-center">
      <input type="checkbox" id="saveInfo" class="p-4 mr-4 border-2 w-6 h-6">
      <label for="saveInfo" class="text-[#979797]">Save Contact Information</label>
    </div>

    <button class="text-center w-full text-white tracking-wider bg-[#0D0D0D] py-4">
      Continue to Shipping
    </button>
  </form>
</template>

