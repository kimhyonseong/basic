package com.fastcampus.ch4.domain;

import org.junit.Test;

import static org.junit.Assert.*;

public class PageHandlerTest {
    @Test
    public void test(){
        PageHandler ph = new PageHandler(250, 1);
        assertTrue(ph.beginPage == 1);
        assertTrue(ph.endPage==10);
    }

    @Test
    public void test2(){
        PageHandler ph = new PageHandler(250, 11);
        assertTrue(ph.beginPage == 11);
        assertTrue(ph.endPage==20);
    }

    @Test
    public void test3(){
        PageHandler ph = new PageHandler(255, 25);
        assertTrue(ph.beginPage == 21);
        assertTrue(ph.endPage==26);
    }
}