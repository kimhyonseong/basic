package com.fastcampus.ch3.aop;

import org.springframework.stereotype.Component;

// 부가 기능 적용할 타겟
@Component
public class MyMath {
    public int add(int a, int b) {
        return a+b;
    }

    public int add(int a, int b, int c) {
        return a+b+c;
    }

    public int subtract(int a, int b){
        return a-b;
    }

    public int multiply(int a, int b){
        return a*b;
    }

}
