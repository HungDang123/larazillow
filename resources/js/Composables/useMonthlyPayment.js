import { computed ,isRef} from "vue";
// isRef để check đó có phải là tham số ref truyền vào ko
export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principal = isRef(total) ? total.value : total;
        const monthlyInterestRate = isRef(interestRate) ? interestRate.value / 100 / 12 : interestRate / 100 / 12;
        const numberOfPayment = isRef(duration) ? duration.value * 12 : duration * 12;
        return (
          (principal *
            monthlyInterestRate * 
            Math.pow(1 + monthlyInterestRate, numberOfPayment)) /
          (Math.pow(1 + monthlyInterestRate, numberOfPayment) - 1)
        );
      });
    const totalPayment = computed(() => {
          return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value;
    });
    const totalInterest = computed(()=>totalPayment.value - (isRef(total) ? total.value : total));
    return {monthlyPayment,totalPayment,totalInterest};
};
