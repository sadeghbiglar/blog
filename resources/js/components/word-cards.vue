<!-- resources/js/components/word-cards.vue -->
<template>
  <div>
    <!-- هدر وضعیت -->
    <div class="flex items-center justify-between mb-4">
      <div>
        <h2 class="text-xl font-extrabold" v-text="state.label"></h2>
        <p class="text-sm text-gray-600">
          نوع مرحله: <span class="font-bold" v-text="state.type === 'special' ? 'ویژه' : 'عادی'"></span>
          <span class="mx-2">|</span>
          تکرار فعلی: <span class="font-bold">{{ localRepeatCount }}</span> / 3
        </p>
      </div>
      <div v-if="banner" class="text-sm px-3 py-1 rounded bg-blue-100 border border-blue-300">
        {{ banner }}
      </div>
    </div>

    <!-- اگر مرحله فعلی تمام شد -->
    <div v-if="stageCompleted" class="flex flex-col items-center justify-center h-80">
      <div class="bg-green-100 border border-green-300 rounded-xl p-6 shadow-lg text-center animate-fade-in">
        <h2 class="text-3xl font-extrabold text-green-700 mb-3">🎉 عالی!</h2>
        <p class="text-lg text-gray-700 mb-4">یک پاس کامل شد. در حال هماهنگی با سرور...</p>
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
        <h3 class="font-bold text-lg mb-2">{{ word.word_en }}</h3>

        <div v-if="!word.showMeaning">
          <button
            @click="word.showMeaning = true"
            class="px-3 py-1 bg-blue-500 text-white rounded"
          >
            نمایش معنی
          </button>
        </div>

        <div v-else>
          <p class="text-gray-700 mb-2 animate-fade-in">{{ word.meaning_fa }}</p>
          <button
            @click="markKnown(index)"
            class="px-3 py-1 bg-green-600 text-white rounded mr-2"
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
    initialState: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      state: {
        type: this.initialState.type,
        label: this.initialState.label,
        stage: this.initialState.stage,
        repeat_count: this.initialState.repeat_count,
        words: this.initialState.words || [],
      },
      shuffledWords: (this.initialState.words || []).map((w) => ({ ...w, showMeaning: false })),
      localRepeatCount: Math.max(1, (this.initialState.repeat_count || 0) + 1), // نمایش برای UI
      stageCompleted: false,
      banner: '',
      isLoading: false,
    };
  },
  methods: {
    csrf() {
      const el = document.querySelector('meta[name="csrf-token"]');
      return el ? el.getAttribute('content') : '';
    },
    shuffle() {
      this.shuffledWords = [...this.shuffledWords].sort(() => Math.random() - 0.5);
    },
    markKnown(index) {
      this.shuffledWords.splice(index, 1);
      if (this.shuffledWords.length === 0) {
        // یک پاس کامل شد
        this.onPassCompleted();
      }
    },
    markUnknown(word) {
      word.showMeaning = false;
      this.shuffle();
    },
    restartStageFrom(words) {
      this.shuffledWords = (words || []).map((w) => ({ ...w, showMeaning: false }));
      this.shuffle();
      this.stageCompleted = false;
    },
    async onPassCompleted() {
      this.stageCompleted = true;
      this.banner = 'در حال ثبت نتیجه...';
      this.isLoading = true;
      try {
        const res = await fetch('/learn504/iteration-complete', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': this.csrf(),
            'Accept': 'application/json',
          },
          body: JSON.stringify({}),
        });
        const data = await res.json();

        if (data.action === 'repeat') {
          // دوباره همین مرحله را تکرار می‌کنیم
          this.localRepeatCount += 1;
          this.banner = 'تکرار مرحله (پاس بعدی)...';
          // کلمات مرحله فعلی را دوباره بارگذاری کن (از state فعلی)
          this.restartStageFrom(this.state.words);
        } else {
          // مرحله ویژه/مرحله بعدی یا اتمام ویژه
          this.banner = data.message || '';
          await this.loadState();
        }
      } catch (e) {
        console.error(e);
        this.banner = 'خطا در ارتباط با سرور.';
      } finally {
        this.isLoading = false;
      }
    },
    async loadState() {
  this.banner = 'دریافت وضعیت جدید...';
  const res = await fetch('/learn504/state', { headers: { 'Accept': 'application/json' } });
  const s = await res.json();

  this.state = {
    type: s.type,
    label: s.label,
    stage: s.stage,
    repeat_count: s.repeat_count,
    words: s.words || [],
  };

  // 👇 اضافه‌شده: پایان دوره
  if (this.state.type === 'completed') {
    this.stageCompleted = false;
    this.shuffledWords = [];
    this.banner = '';
    // اینجا می‌تونی یک مودال یا پیام بزرگ هم نشون بدی
    return;
  }

  this.localRepeatCount = Math.max(1, (s.repeat_count || 0) + 1);
  this.restartStageFrom(this.state.words);
  this.banner = '';
},
  },
  mounted() {
    this.shuffle();
  },
};
</script>

<style>
.animate-fade-in { animation: fadeIn 0.5s ease-in-out; }
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to   { opacity: 1; transform: translateY(0); }
}
.shuffle-move { transition: all 2s ease; }
.shuffle-enter-active, .shuffle-leave-active { transition: all 0.5s ease; }
.shuffle-enter-from { opacity: 0; transform: translateY(20px); }
.shuffle-leave-to   { opacity: 0; transform: translateY(-20px); }
</style>
