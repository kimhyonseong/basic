package com.fastcampus.ch3.aop;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.GenericXmlApplicationContext;

// 안됨... 포기
public class AopMain2 {
    public static void main(String[] args) {
        ApplicationContext ac = new GenericXmlApplicationContext("file:src/main/webapp/WEB-INF/spring/**/root-context_aop.xml");
//        ApplicationContext ac = new GenericXmlApplicationContext("file:src/main/webapp/WEB-INF/spring/**/root-context.xml");

        MyMath mm = (MyMath) ac.getBean("myMath");

        System.out.println("mm.add = "+mm.add(3,5));
        System.out.println("mm.subtract = " + mm.subtract(3,5));
    }
}
