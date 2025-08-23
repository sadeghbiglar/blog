<template>
  <div>
    <!-- اگه مرحله تموم شد -->
    <div v-if="stageCompleted" class="flex flex-col items-center justify-center h-80">
      <div class="bg-green-100 border border-green-300 rounded-xl p-6 shadow-lg text-center animate-fade-in">
        <h2 class="text-3xl font-extrabold text-green-700 mb-3">🎉 تبریک!</h2>
        <p class="text-lg text-gray-700 mb-4">شما این مرحله رو با موفقیت پشت سر گذاشتید.</p>
        <button
          @click="goNextStage"
          class="px-6 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition"
        >
          رفتن به مرحله بعد 🚀
        </button>
      </div>
    </div>

    <!-- کارت‌های کلمات -->
    <transition-group
      v-else
      name="shuffle"
      tag="div"
      class="grid grid-cols-2 md:grid-cols-3 gap-4"
    >
      <div
        v-for="(word, index) in shuffledWords"
        :key="word.id"
        class="p-4 border rounded shadow bg-white transition transform hover:scale-105"
      >
        <img
          :src="word.image_url"
          alt="word image"
          class="w-full h-32 object-cover rounded mb-2"
        />
        <h2 class="font-bold text-lg mb-2">{{ word.word_en }}</h2>

        <div v-if="!word.showMeaning">
          <button
            @click="word.showMeaning = true"
            class="px-3 py-1 bg-blue-500 text-white rounded"
          >
            نمایش معنی
          </button>
        </div>

        <div v-else>
          <p class="text-gray-600 mb-2 animate-fade-in">{{ word.meaning_fa }}</p>
          <button
            @click="markKnown(index)"
            class="px-3 py-1 bg-green-500 text-white rounded mr-2"
          >
            بلدم
          </button>
          <button
            @click="markUnknown(word)"
            class="px-3 py-1 bg-red-500 text-white rounded"
          >
            بلد نبودم
          </button>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  props: {
    words: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      shuffledWords: this.words.map((w) => ({ ...w, showMeaning: false })),
      repeatCount: 1,
      stageCompleted: false,
    };
  },
  methods: {
    shuffle() {
      this.shuffledWords = [...this.shuffledWords].sort(() => Math.random() - 0.5);
    },
    markKnown(index) {
      this.shuffledWords.splice(index, 1);
      if (this.shuffledWords.length === 0) {
        this.repeatCount++;
        if (this.repeatCount > 3) {
          this.stageCompleted = true;
        } else {
          this.restartStage();
        }
      }
    },
    markUnknown(word) {
      word.showMeaning = false;
      this.shuffle();
    },
    restartStage() {
      this.shuffledWords = this.words.map((w) => ({
        ...w,
        showMeaning: false,
      }));
      this.shuffle();
    },
    goNextStage() {
      this.stageCompleted = false;
      alert("🚀 اینجا بعداً وصل میشه به مرحله بعدی از بک‌اند");
    },
  },
  mounted() {
    this.shuffle();
  },
};
</script>

<style>
/* انیمیشن fade */
.animate-fade-in {
  animation: fadeIn 0.5s ease-in-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* انیمیشن کارت‌ها موقع جابجایی */
.shuffle-move {
  transition: all 2s ease;
}
.shuffle-enter-active,
.shuffle-leave-active {
  transition: all 0.5s ease;
}
.shuffle-enter-from {
  opacity: 0;
  transform: translateY(20px);
}
.shuffle-leave-to {
  opacity: 0;
  transform: translateY(-20px);
}
</style>
