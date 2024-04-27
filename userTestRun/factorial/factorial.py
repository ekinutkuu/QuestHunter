def factorial(num):
    sum = 1
    for i in range(1, num + 1):
        sum *= i;
    return sum;

print(factorial(5))