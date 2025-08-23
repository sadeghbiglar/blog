<template>
  <div class="p-4 bg-green-200 rounded">
    <h2 class="text-xl font-bold">سلام! من یک کامپوننت Vue هستم 🎉</h2>
    <button @click="count++" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">
      شمارش: {{ count }}
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>
