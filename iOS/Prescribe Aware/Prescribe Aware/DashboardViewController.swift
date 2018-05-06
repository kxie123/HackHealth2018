//
//  DashboardViewController.swift
//  Prescribe Aware
//
//  Created by Stephen Sowole on 5/6/18.
//  Copyright © 2018 HackHLTH. All rights reserved.
//

import UIKit
import Charts

class DashboardViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()

        view.backgroundColor = .white

        layoutDashboardView()
        layoutDashboardTitle()
        layoutSatisfactionLineChart()
        layoutRecommendLineChart()

        setupChartData()
    }

    private lazy var dashboardContainerView: UIView = {
        let view = UIView()
        view.backgroundColor = UIColor(white: 0.95, alpha: 1.0)
        view.layer.borderWidth = 1.0
        view.layer.borderColor = UIColor(white: 0.9, alpha: 1.0).cgColor
        return view
    }()

    private lazy var dashboardLabel: UIView = {
        let label = UILabel()
        label.text = "Dashboard"
        label.textColor = UIColor(white: 0.4, alpha: 1.0)
        label.font = UIFont(name: "Avenir Next", size: 18.0)
        return label
    }()

    private lazy var satisfactionLineChart: LineChart = {
        return LineChart(name: "User Satisfaction", color: .purple)
    }()

    private lazy var recommendLineChart: LineChart = {
        return LineChart(name: "User Recommendation", color: .red)
    }()

    func setupChartData() {
        satisfactionLineChart.delegate = self
        recommendLineChart.delegate = self
    }
}

extension DashboardViewController: GetChartData {
    func getChartData(with dataPoints: [String], values: [String]) {
    }

    var dataPoints: [String] {
        let months = ["Mon", "Tues", "Wed", "Thurs", "Fri", "Sat", "Sun"]
        return months
    }

    var values: [String] {
        let unitsSold = ["20.0", "4.0", "6.0", "3.0", "12.0", "16.0", "4.0"]
        return unitsSold
    }
}

private extension DashboardViewController {

    func layoutDashboardView() {
        view.addSubview(dashboardContainerView)

        dashboardContainerView.translatesAutoresizingMaskIntoConstraints = false
        dashboardContainerView.topAnchor.constraint(equalTo: view.topAnchor, constant: 50).isActive = true
        dashboardContainerView.leadingAnchor.constraint(equalTo: view.leadingAnchor, constant: 50).isActive = true
        dashboardContainerView.heightAnchor.constraint(equalToConstant: 60).isActive = true
        dashboardContainerView.trailingAnchor.constraint(equalTo: view.trailingAnchor, constant: -50).isActive = true
    }

    func layoutDashboardTitle() {
        view.addSubview(dashboardLabel)

        dashboardLabel.translatesAutoresizingMaskIntoConstraints = false
        dashboardLabel.centerYAnchor.constraint(equalTo: dashboardContainerView.centerYAnchor).isActive = true
        dashboardLabel.leadingAnchor.constraint(equalTo: dashboardContainerView.leadingAnchor, constant: 28).isActive = true
    }

    func layoutSatisfactionLineChart() {
        view.addSubview(satisfactionLineChart)

        satisfactionLineChart.translatesAutoresizingMaskIntoConstraints = false
        satisfactionLineChart.leadingAnchor.constraint(equalTo: dashboardContainerView.leadingAnchor).isActive = true
        satisfactionLineChart.topAnchor.constraint(equalTo: dashboardContainerView.bottomAnchor, constant: 60.0).isActive = true
        satisfactionLineChart.heightAnchor.constraint(equalToConstant: 400).isActive = true
        satisfactionLineChart.widthAnchor.constraint(equalToConstant: 480).isActive = true
    }

    func layoutRecommendLineChart() {
        view.addSubview(recommendLineChart)

        recommendLineChart.translatesAutoresizingMaskIntoConstraints = false
        recommendLineChart.trailingAnchor.constraint(equalTo: view.trailingAnchor, constant: -50).isActive = true
        recommendLineChart.topAnchor.constraint(equalTo: satisfactionLineChart.topAnchor).isActive = true
        recommendLineChart.heightAnchor.constraint(equalTo: satisfactionLineChart.heightAnchor).isActive = true
        recommendLineChart.widthAnchor.constraint(equalTo: satisfactionLineChart.widthAnchor).isActive = true
    }
}
