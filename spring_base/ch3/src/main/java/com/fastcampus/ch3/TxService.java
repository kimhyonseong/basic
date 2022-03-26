package com.fastcampus.ch3;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class TxService {
    @Autowired A1Doa a1Doa;
    @Autowired B1Doa b1Doa;

    public void insertA1WithoutTx() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(1,200);
    }

    @Transactional
    public void insertA1WithTxFail() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(1,200);
    }

    @Transactional
    public void insertA1WithTxSuccess() throws Exception {
        a1Doa.insert(1,100);
        a1Doa.insert(2,200);
    }

    public void deleteA1() throws Exception {
        a1Doa.delteAll();
    }
}
